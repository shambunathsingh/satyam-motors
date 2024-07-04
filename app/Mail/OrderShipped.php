<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order\Order;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('front.orders_send_to_mail.index')
            ->with([
                'orderName' => $this->order->name,
                'orderPrice' => $this->order->price,
                // Add more details here...
            ]);
    }
}

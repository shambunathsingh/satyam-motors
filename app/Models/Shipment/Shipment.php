<?php
// app/Models/Shipment.php

namespace App\Models\Shipment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Orders\Order;
use App\Models\Order\Order;
class Shipment extends Model
{
    use HasFactory;
    protected $table = "Shipments";

    protected $fillable = [
        'order_id',
        'user_id',
        'weight',
        'shipment_id',
        'rate_id',
        'note',
        'status',
        'cod_amount',
        'cod_status',
        'cross_checking_status',
        'price',
        'store_id',
        'tracking_id',
        'shipping_company_name',
        'tracking_link',
        'estimate_date_shipped',
        'date_shipped',
        'label_url',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
        'estimate_date_shipped' => 'datetime',
        'date_shipped' => 'datetime'
    ];
     public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

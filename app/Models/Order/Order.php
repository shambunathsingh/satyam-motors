<?php

namespace App\Models\Order;

use App\Models\ProductOrder\ProductOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\Customer;
use App\Models\Shipment\Shipment;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillabe = [
        'customer_id',
        'order_id',
        'first_name',
        'last_name',
        'company_name',
        'country',
        'street_address',
        'street_address2',
        'town_city',
        'state',
        'pin_code',
        'phone',
        'email',
        'account_username',
        'order_notes',
        'is_paid',
    ];

    // public function productOrders()
    // {
    //     return $this->hasMany(ProductOrder::class);
    // }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Define the relationship with the ProductOrder model (assuming it exists)
    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class);
    }
    public function shipment()
    {
        return $this->hasMany(Shipment::class);
    }
}

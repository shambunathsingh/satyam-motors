<?php

namespace App\Models\Marketplaces;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\Customer;

class VendorInfo extends Model
{
    protected $table = 'vendor_info';

    protected $fillable = [
        'customer_id', 'balance', 'total_fee', 'total_revenue', 'signature', 'bank_info',
        'created_at', 'updated_at', 'payout_payment_method', 'tax_info'
    ];
     public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

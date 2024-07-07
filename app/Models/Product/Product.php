<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ProductOrder\ProductOrder;
use App\Models\Order\Order;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'reg_no',
        'reg_rto',
        'manfacture_date',
        'reg_date',
        'owner_name',
        'rc_blacklist_status',
        'make',
        'model',
        'vehicle_class',
        'wheel_base',
        'chasis_no',
        'engine_no',
        'fuel_type',
        'fuel_norm',
        'categories',
        'brand_id',
        'status',
        'featured_image'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class, 'categories', 'id');
    }

    public static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::whereSlug($slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
    public function order()
    {
        return $this->belongsTo(order::class);
    }
}

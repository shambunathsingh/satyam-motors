<?php

namespace App\Models\Cart;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart_details';

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getCartDetails()
    {
        // Fetch cart details from the database or session
        $cartItems = Cart::all(); // Fetch cart items from Cart model

        // Array to store product details
        $products = [];

        // Fetch product details based on product_id
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id); // Fetch product based on product_id
            if ($product) {
                $products[$cartItem->product_id] = $product; // Store product details in the array with product_id as key
            } else {
                // Handle the case where the product is not found
                // For example, log an error, skip the item, or provide a default product
                // Here, we'll skip the item
                continue;
            }
        }

        // Calculate total amount
        $totalAmount = 0;

        foreach ($cartItems as $cartItem) {
            if (isset($products[$cartItem->product_id])) {
                $totalAmount += $cartItem->quantity * $products[$cartItem->product_id]->price; // Calculate total amount
            } else {
                // Handle the case where the product details are not available
                // For example, skip the item
                continue;
            }
        }

        return [
            'items' => $cartItems,
            'products' => $products,
            'totalAmount' => $totalAmount // Add total amount to the returned array
        ];
    }
}

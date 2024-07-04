<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\WishList\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add_to_wishlist(Request $request)
    {
        if (Auth::guard('customer')->check() && Auth::guard('customer')->id()) {
            $customerId = Auth::guard('customer')->id();
            $productId = $request->input('product_id');

            $wishlist = new WishList();
            $wishlist->customer_id = $customerId;
            $wishlist->product_id = $productId;
            $wishlist->save();

            return response()->json(['message' => 'Added to wishlist !'], 200);
        } else {
            return response()->json(['message' => 'Login First !'], 401);
        }
    }

    public function showAllWishList()
    {
        $title = "Carzex - Wishlist";

        if (Auth::guard('customer')->check() && Auth::guard('customer')->id()) {
            $customerId = Auth::guard('customer')->id();
            $wishlistItems = WishList::where('customer_id', $customerId)->get();

            $productlistItems = [];
            foreach ($wishlistItems as $wishitem) {
                $product = Product::findOrFail($wishitem->product_id);
                $productlistItems[] = $product;
            }
            // dd($productlistItems);
            // exit;

            return view('front.wishlist.index', ['title' => $title, 'wishlistItems' => $productlistItems]);
        } else {
            return redirect()->route('home')->with('warning', 'Login First !');
        }
    }


    public function delete_wishlist($id)
    {
        // Retrieve the first wishlist item with the specified product_id
        $wishlistItem = WishList::where('product_id', $id)->first();

        // Check if the wishlist item exists
        if ($wishlistItem) {
            // Delete the wishlist item
            $wishlistItem->delete();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Removed from wishlist!');
    }
}

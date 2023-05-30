<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->product_rating;
        $category_id = $request->category_id;

        $product_check = Category::where('id', $category_id)->first();

        if ($product_check == null) {
            return redirect()->back()->with('status', "The link you followed was broken");
        }

        $verified_purchase = Order::where('user_id', Auth::id())
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('order_items.prod_id', $category_id)
            ->where('orders.status', 1)
            ->first();

        if ($verified_purchase == null) {
            return redirect()->back()->with('status', "You cannot rate a product without purchase");
        }

        $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $category_id)->first();
        if ($existing_rating) {
            $existing_rating->stars_rated = $stars_rated;
            $existing_rating->update();
        } else {
            Rating::create([
                'user_id' => Auth::id(),
                'prod_id' => $category_id,
                'stars_rated' => $stars_rated
            ]);
        }
        return redirect()->back()->with('status', "Thank you for rating this product");
    }
}

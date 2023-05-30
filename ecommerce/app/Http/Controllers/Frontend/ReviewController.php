<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '1')->first();

        if ($category) {
            $category_id = $category->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $category_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                $verified_purchase = Order::where('user_id', Auth::id())
                    ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                    ->where('order_items.prod_id', $category_id)
                    ->where('orders.status', 1)
                    ->first();
                return view('frontend.reviews.index', compact('category', 'verified_purchase'));
            }
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    public function create(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = Category::where('id', $category_id)->where('status', '1')->first();

        if ($category) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' =>  $category_id,
                'user_review' => $user_review

            ]);
            $category_slug = $category->slug;
            $prod_slug = $category->slug;
            if ($new_review) {
                return redirect('category/' . $category_slug . '/' . $prod_slug)->with('status', "Thank you for writing a review");
            }
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    public function edit($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '1')->first();
        if ($category) {
            $category_id = $category->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $category_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        } else {
            return redirect()->back()->with('status', "The link you followed was broken");
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('category/' . $review->category->slug . '/' . $review->category->slug)->with('status', "Review Updated Successfuly");
            } else {
                return redirect()->back()->with('status', "The link you followed was broken");
            }
        } else {
            return redirect()->back()->with('status', "You cannot submit an empty review");
        }
    }
}

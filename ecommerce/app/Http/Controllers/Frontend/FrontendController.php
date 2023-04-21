<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_category = Category::where('status', '1')->take(15)->get();
        return view('frontend.index', compact('featured_category'));
    }

    public function productview($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Category::where('slug', $prod_slug)->exists()) {
                $category = Category::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('category'));
            } else {
                return redirect('/')->with('status', "The link was broken");
            }
        } else {
            return redirect('/')->with('status', "No such product found");
        }
    }
}

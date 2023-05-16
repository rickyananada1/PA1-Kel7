<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

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
                return redirect()->back()->with("status", "No products matched your search");
            }
        } else {
            return redirect('/')->with('status', "No such product found");
        }
    }

    public function productlistAjax()
    {
        $category = Category::select('name')->where('status', '1')->get();
        $data = [];

        foreach ($category as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if ($searched_product != "") {
            $category = Category::where("name", "LIKE", "%$searched_product%")->first();
            if ($category) {
                return redirect('category/' . $category->slug . '/' . $category->slug);
            } else {
                return redirect()->back()->with("status", "No products matched your search");
            }
        } else {
            return redirect()->back();
        }
    }
}

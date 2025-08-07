<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Country;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $category_count = Category::category_count();
        $brand_count = Brand::brand_count();
        $product_count = Product::product_count();
        $country_count = Country::country_count();

        return view('admin.home.index', [
            'category_count' => $category_count,
            'brand_count' => $brand_count,
            'product_count' => $product_count,
            'country_count' => $country_count,
        ]);
    }
}

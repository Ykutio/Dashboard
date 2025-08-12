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
        $categoryCount = Category::categoryCount();
        $brandCount = Brand::brandCount();
        $productCount = Product::productCount();
        $countryCount = Country::countryCount();

        return view('admin.home.index', [
            'categoryCount' => $categoryCount,
            'brandCount' => $brandCount,
            'productCount' => $productCount,
            'countryCount' => $countryCount,
        ]);
    }
}

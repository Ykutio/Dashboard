<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::products();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::categories();
        $brands = Brand::brands();
        $countries = Country::countries();

        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $new_category = new Product();
        $new_category->name = $request->name;
        $new_category->description = $request->description;
        $new_category->status = $request->status;
        $new_category->save();

        return redirect()
            ->back()
            ->with('success', 'Продукт был успешно добавлен!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::categories();
        $brands = Brand::brands();
        $countries = Country::countries();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $brand): RedirectResponse
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->
        route('product.index')
            ->with('success', 'Продукт был успешно обнавлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()
            ->back()
            ->with('info','Продукт был успешно удален!');
    }
}

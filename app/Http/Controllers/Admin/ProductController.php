<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
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
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validatedData = $request->validated(); // The validated data is automatically available
        Product::create($validatedData);

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
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated(); // The validated data is automatically available
        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Продукт был успешно обновлен!');
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

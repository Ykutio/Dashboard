<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductListRequest;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductListRequest $request): View
    {
        $validatedData = $request->validated();

        $products = Product::productsByFilter($validatedData);
        $products->load('brand', 'category', 'country'); // To resolve "N+1 query" problem
        $brands = Brand::getAllBrands();
        $countries = Country::getAllCountries();
        $categories = Category::getAllCategories();

        return view('admin.product.index', [
            'products' => $products,
            'brands' => $brands,
            'countries' => $countries,
            'categories' => $categories,
            'filters' => $validatedData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::getAllCategoriesPaginate();
        $brands = Brand::getAllBrandsPaginate();
        $countries = Country::getAllCountriesPaginate();

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
            ->with('success', 'Product added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $categories = Category::getAllCategoriesPaginate();
        $brands = Brand::getAllBrandsPaginate();
        $countries = Country::getAllCountriesPaginate();

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

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('uploads', 'public');
            $validated['img'] = $path;
        }
        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->back()
            ->with('info', 'Product deleted successfully!');
    }
}

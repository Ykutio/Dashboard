<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\BrandListRequest;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandListRequest $request): View
    {
        $validatedData = $request->validated();
        $brands = Brand::brandsByFilter($validatedData);
        $countries = Country::getAllCountries();

        return view('admin.brand.index', [
            'brands' => $brands,
            'countries' => $countries,
            'filters' => $validatedData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::getAllCountriesPaginate();

        return view('admin.brand.create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $validatedData = $request->validated(); // The validated data is automatically available
        Brand::create($validatedData);

        return redirect()
            ->back()
            ->with('success', 'Brand added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        $countries = Country::getAllCountriesPaginate();

        return view('admin.brand.edit', [
            'brand' => $brand,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $validated = $request->validated(); // The validated data is automatically available
        $brand->update($validated);

        return redirect()
            ->route('brand.index')
            ->with('success', 'Brand updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()
            ->back()
            ->with('info', 'Brand deleted successfully!');
    }
}

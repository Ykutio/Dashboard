<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Country\CountryListRequest;
use App\Http\Requests\Admin\Country\StoreCountryRequest;
use App\Http\Requests\Admin\Country\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(CountryListRequest $request): View
    {
        $validatedData = $request->validated();
        $countries = Country::countriesByFilter($validatedData);

        return view('admin.country.index', [
            'countries' => $countries,
            'filters' => $validatedData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request): RedirectResponse
    {
        $validatedData = $request->validated(); // The validated data is automatically available
        Country::create($validatedData);

        return redirect()
            ->back()
            ->with('success', 'Country added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): View
    {
        return view('admin.country.edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): RedirectResponse
    {
        $validated = $request->validated(); // The validated data is automatically available
        $country->update($validated);

        return redirect()
            ->route('country.index')
            ->with('success', 'Country updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();

        return redirect()
            ->back()
            ->with('info', 'Country deleted successfully!');
    }
}

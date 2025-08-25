<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryListRequest;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(CategoryListRequest $request): View
    {
        $validatedData = $request->validated();
        $categories = Category::categoriesByFilter($validatedData);

        return view('admin.category.index', [
            'categories' => $categories,
            'filters' => $validatedData
        ]);
    }

    public function create(): View
    {
        return view('admin.category.create');
    }


    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $validatedData = $request->validated(); // The validated data is automatically available
        Category::create($validatedData);

        return redirect()
            ->back()
            ->with('success', 'Category added successfully!');
    }

    public function edit(Category $category): View
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated(); // The validated data is automatically available
        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->back()
            ->with('info', 'Category deleted successfully!');
    }
}

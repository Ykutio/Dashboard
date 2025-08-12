<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::categories();

        return view('admin.category.index', [
            'categories' => $categories
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
            ->with('success', 'Категория была успешно добавленна!');
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
            ->with('success', 'Категория была успешно обновленна!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->back()
            ->with('info', 'Категория была успешно удалена!');
    }
}

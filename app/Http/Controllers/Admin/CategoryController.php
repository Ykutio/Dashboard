<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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


    public function store(Request $request): RedirectResponse
    {
        $new_category = new Category();
        $new_category->name = $request->name;
        $new_category->description = $request->description;
        $new_category->status = $request->status;
        $new_category->save();

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

    public function update(Request $request, Category $category): RedirectResponse
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();

        return redirect()
            ->route('category.index')
            ->with('success', 'Категория была успешно обнавленна!');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->back()
            ->with('info','Категория была успешно удалена!');
    }
}

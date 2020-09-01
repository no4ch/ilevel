<?php

namespace App\Http\Controllers\Dashboard\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Categories\StoreRequest;
use App\Http\Requests\Dashboard\Categories\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->validated());
        session()->flash('success', "Категория '$category->name' добавлена");

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Category  $category
     * @param  UpdateRequest  $request
     * @return RedirectResponse
     */
    public function update(Category $category, UpdateRequest $request)
    {
        $category->update($request->only(['name', 'description']));
        session()->flash('success', 'Категория обновлена');

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Категория удалена');
        return redirect()->route('dashboard.categories.index');
    }
}

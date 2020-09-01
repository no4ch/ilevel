<?php

namespace App\Http\Controllers\Dashboard\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\DestroyCategoryRequest;
use App\Http\Requests\Dashboard\Products\StoreRequest;
use App\Http\Requests\Dashboard\Products\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Products\ProductHandler;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    public function index(Category $category)
    {
        return view('dashboard.products.index', compact('category'));
    }

    public function edit(Category $category, Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories', 'category'));
    }

    public function update(Category $category, Product $product, UpdateRequest $request)
    {
        ProductHandler::make()->update($product, $request);

        return redirect()->route('dashboard.categories.products.index', $category->id);
    }

    public function create(Category $category)
    {
        $categories = Category::all();
        $createMode = true;
        return view('dashboard.products.create', compact('category', 'categories', 'createMode'));
    }

    public function store(Category $category, StoreRequest $request)
    {
        ProductHandler::make()->store($category, $request);

        return redirect()->route('dashboard.categories.products.index', $category->id);
    }

    public function destroy(Category $category, Product $product)
    {
        ProductHandler::make()->delete($product);

        return redirect()->route('dashboard.categories.products.index', $category->id);
    }

    public function destroyCategory(int $category_id, DestroyCategoryRequest $request)
    {
        ProductHandler::make()->destroyCategory($category_id, $request);

        return redirect()->route('dashboard.categories.index');
    }
}

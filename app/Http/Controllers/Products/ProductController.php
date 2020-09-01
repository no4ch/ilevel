<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function index($category_id)
    {
        $category = Category::findOrFail($category_id);
        $products = $category->products;
        return response()->json(compact('products'));
    }
}

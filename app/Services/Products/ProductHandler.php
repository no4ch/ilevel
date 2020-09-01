<?php


namespace App\Services\Products;


use App\Http\Requests\Dashboard\Products\DestroyCategoryRequest;
use App\Http\Requests\Dashboard\Products\StoreRequest;
use App\Http\Requests\Dashboard\Products\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductHandler
{
    public static function make(): ProductHandler
    {
        return new static();
    }

    public function update(Product $product, UpdateRequest $request)
    {
        $product->update($request->only(['name', 'description', 'price']));

        $addedCategory = $request->get('category_id');
        if ($addedCategory != -1) {
            $attachCategory = Category::find($addedCategory);
            if ($attachCategory) {
                $addedCategoryAvailability = DB::table('category_product')->where([
                    ['category_id', $addedCategory],
                    ['product_id', $product->id]
                ])->exists();
                if (!$addedCategoryAvailability) {
                    $product->categories()->attach($attachCategory);
                }
            }
        }
        session()->flash('success', "Товар '$product->name' обновлен");
    }

    public function store(Category $category, StoreRequest $request)
    {
        $product = Product::create($request->only(['name', 'description', 'price']));

        $category->products()->attach($product);

        session()->flash('success', "Товар '$product->name' добавлен");
    }

    public function delete(Product $product)
    {
        $product->delete();

        session()->flash('success', 'Товар удален');
    }

    public function destroyCategory(int $category_id, DestroyCategoryRequest $request)
    {
        $product = Product::find($request->get('product_id'));
        $category = Category::find($category_id);

        if (DB::table('category_product')->where('product_id', $product->id)->count() > 1) {
            $category->products()->detach($product);
            session()->flash('success', 'Категория убрана');
        } else {
            session()->flash('warning', 'У товара обязательно наличие 1й категории');
        }
    }
}

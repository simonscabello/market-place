<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Product;
use App\Traits\UploadTrait;

/**
 * @method has_many(string $string)
 */
class ProductController extends Controller
{
    use uploadTrait;

    public function index()
    {
        $userStore = auth()->user()->store;

        $products = $userStore->products()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = auth()->user()->store->categories;

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->all();

        $store = auth()->user()->store;

        $product = $store->products()->create($data);
        $product->categories()->attach($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto criado com sucesso.')->success();

        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all(['id', 'name']);


        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id): RedirectResponse
    {
        $data = $request->all();

        $product = Product::find($id);
        $product->update($data);
        $product->categories()->attach($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photos()->createMany($images);
        }

        flash('Produto atualizado com sucesso.')->success();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::find($id);
        $product->photos()->delete();
        $product->categories()->detach();

        $product->delete();

        flash('Produto removido com sucesso.')->success();

        return redirect()->route('admin.products.index');
    }
}

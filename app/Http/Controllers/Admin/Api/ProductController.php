<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        if(!$products){
            return response()->json(['Whoops' => 'Nenhum produto cadastrado.']);
        }

        ProductResource::wrap('Produtos');
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(!$product){
            return response()->json(['Whoops' => 'Produto não encontrado.']);
        }

        ProductResource::wrap('Produto');
        return ProductResource::make($product);
    }
}

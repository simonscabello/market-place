<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        if(!$categories){
            return response()->json(['Whoops' => 'Nenhuma categoria encontrada.']);
        }

        CategoryResource::wrap('Categorias');
        return CategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if(!$category){
            return response()->json(['Whoops' => 'Nenhuma categoria encontrada.']);
        }

        CategoryResource::wrap('Categoria');
        return CategoryResource::make($category);
    }
}

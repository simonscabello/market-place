<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::whereSlug($slug)->orderBy('id', 'DESC')->first();

        return view('category', compact('category'));
    }
}

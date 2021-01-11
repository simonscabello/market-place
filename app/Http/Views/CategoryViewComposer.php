<?php


namespace App\Http\Views;


use App\Category;

class CategoryViewComposer
{
    public function compose($view)
    {
        return $view->with('categories', Category::all(['name', 'slug']));
    }
}

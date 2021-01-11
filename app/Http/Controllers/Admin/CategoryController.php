<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $userStore = auth()->user()->store;
        $category = $userStore->categories()->paginate(10);

        return view('admin.categories.index', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->all();

        $store = auth()->user()->store;

        $store->categories()->create($data);

        flash('Categoria Criada com Sucesso!')->success();

        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $category): RedirectResponse
    {
        $data = $request->all();

        $category = Category::find($category);
        $category->update($data);

        flash('Categoria Atualizada com Sucesso!')->success();

        return redirect()->route('admin.categories.index');
    }

    public function destroy($category): RedirectResponse
    {
        $category = Category::find($category);
        $category->delete();

        flash('Categoria Removida com Sucesso!')->success();

        return redirect()->route('admin.categories.index');
    }
}

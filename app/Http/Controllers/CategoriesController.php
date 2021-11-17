<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rules);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoría modificada correctamente');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada corectamente');
    }
}

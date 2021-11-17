<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    public function create(Request $request)
    {
        $Userid = $request->user()->id;
        $categories = Category::pluck("name","id");
        $product = new Product();
        return view('product.create', compact('product','categories','Userid'));
    }

    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    public function edit(Request $request,$id)
    {
        $Userid = $request->user()->id;
        $categories = Category::pluck("name","id");
        $product = Product::find($id);

        return view('product.edit', compact('product','categories','Userid'));
    }

    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Producto modificado correctamente');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}

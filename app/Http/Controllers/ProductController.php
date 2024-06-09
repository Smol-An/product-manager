<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        //$products = Product::available()->get();
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
       // $this->authorize('update', $product);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
      //  $this->authorize('update', $product);

        $data = $request->validated();
      /*  if ($request->user()->role !== config('products.role')) {
            unset($data['article']);
        }*/
        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        //$this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index');
    }
}

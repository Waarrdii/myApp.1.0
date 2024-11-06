<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Product/ProductIndex', [
            // Menggunakan resolve untuk mendapatkan array langsung tanpa pembungkus 'data'
            'products' => ProductResource::collection(Product::all())->resolve()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Product/ProductDetails', ['product' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('Product/ProductDetails', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('Product/ProductDetails', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $product->delete();
    //     return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    // }
    public function destroy(Request $request, $id)
    {
        foreach ($request->ids as $id) {
            $product = Product::findOrFail($id);
            $product->delete(); // Atau gunakan soft deletes dengan $product->delete()
        }
    
        return redirect()->route('products.index')->with('success', 'Products deleted successfully.');
    }

    public function destroyMultiple(Request $request)
    {
        Product::whereIn('id', $request->ids)->delete();
        return redirect()->route('products.index')->with('success', 'Products deleted successfully.');
    }
}

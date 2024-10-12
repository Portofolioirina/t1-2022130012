<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|size:12|unique:products,id',
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('product_image')->store('public/images');

            $validated['product_image'] = $imagePath;
           }

        Product::create([
            'id' => $validated['id'],
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            'origin' => $validated['origin'],
            'quantity' => $validated['quantity'],
            'product_image' => $validated['product_image'] ?? null,
           ]);

           return redirect()->route('product.index')->with('succes', 'Product added successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'id' => 'required|string|size:12',
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('product_image')->storePublicly('public/images');

            //hapus file existing
            if ($product->avatar){
                Storage::delete($product->product_image);
            }

            $validated['product_image'] = $imagePath;
        }

        $product->update([
            'id' => $validated['id'],
            'product_name' => $validated['product_name'],
            'description' => $validated['description'],
            'retail_price' => $validated['retail_price'],
            'wholesale_price' => $validated['wholesale_price'],
            'origin' => $validated['origin'],
            'quantity' => $validated['quantity'],
            'product_image' => $validated['product_image'] ?? $product->product_image,
        ]);

    return redirect()->route('product.index')->with('succes', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->product_image){
            Storage::delete($product->product_image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('succes', 'Product deleted successfully.');
    }
}

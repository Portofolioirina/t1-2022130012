<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    $totalQuantity = Product::sum('quantity');

    $mostExpensiveProduct = Product::orderBy('retail_price', 'desc')->first();

    $mostQuantityProduct = Product::orderBy('quantity', 'desc')->first();

    return view('dashboard.index', compact('totalQuantity', 'mostExpensiveProduct', 'mostQuantityProduct'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'retail_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'origin' => 'required|string|size:2',
            'quantity' => 'required|integer',
        ]);

        Product::create($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Produk berhasil disimpan.');
    }

}

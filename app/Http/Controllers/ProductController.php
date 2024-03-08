<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::all();

    return view('products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('products.form');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $product = Product::create([
      'name' => $request->post('name'),
      'category' => $request->post('category'),
    ]);

    $product->stock()->create([
      'stock' => $request->post('stock')
    ]);

    return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $product = Product::find($id);

    return view('products.form', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $product = Product::find($id);

    $product->update([
      'name' => $request->post('name'),
      'category' => $request->post('category'),
    ]);

    $product->stock()->update([
      'stock' => $request->post('stock')
    ]);

    $currentStock = $product->stock->stock;
    $hasSold = 0;

    foreach ($product->transactions as $transaction) {

      $product->transactions()->where('id', $transaction->id)->update([
        'last_stock' => $currentStock - $hasSold
      ]);

      $hasSold += $transaction->sold;

    }

    $product->stock()->update([
      'stock' => $currentStock - $hasSold
    ]);

    return redirect()->route('products.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $product = Product::find($id);

    $product->transactions()->delete();
    $product->stock()->delete();
    $product->delete();

    return redirect()->route('products.index');
  }
}

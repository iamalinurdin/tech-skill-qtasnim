<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $search = $request->query('search');
    $transactions = Transaction::with('product')->get();

    if ($search) {
      $transactions = Transaction::whereHas('product', function ($builder) use ($search) {
        $builder->where('name', 'LIKE', "%{$search}%");
      })->get();
    }

    return view('transactions.index', compact('transactions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $products = Product::all();

    return view('transactions.form', compact('products'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $productId = $request->post('product_id');
    $sold = (int) $request->post('sold');
    $product = Product::find($productId);
    $currentStock = $product->stock->stock;

    $product->transactions()->create([
      'sold' => $sold,
      'last_stock' => $currentStock,
      'transaction_date' => Date::now()
    ]);

    $product->stock()->update([
      'stock' => $currentStock - $sold
    ]);

    return redirect()->route('transactions.index');
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
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

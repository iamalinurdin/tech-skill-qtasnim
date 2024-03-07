<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
  use HasFactory;

  protected $guarded = [];

  /**
   * Get the stock associated with the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function stock(): HasOne
  {
    return $this->hasOne(Stock::class, 'product_id', 'id');
  }

  /**
   * Get all of the transactions for the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function transactions(): HasMany
  {
    return $this->hasMany(Transaction::class, 'product_id', 'id');
  }
}

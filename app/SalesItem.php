<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
  protected $fillable = [
      'sale_id',
      'user_id',
      'club_id',
      'sku',
      'quantity',
      'point',
      'product_id',
      'product_name',
  ];
}

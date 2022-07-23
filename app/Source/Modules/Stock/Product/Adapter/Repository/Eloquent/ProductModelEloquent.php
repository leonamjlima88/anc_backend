<?php

namespace App\Source\Modules\Stock\Product\Adapter\Repository\Eloquent;

use App\Source\Shared\Adapter\Repository\Eloquent\ModelEloquentBase;

class ProductModelEloquent extends ModelEloquentBase
{
  protected $table = 'product';
  protected $fillable = [
    'name',
    'description',
    'sku',
    'price',
  ];
}

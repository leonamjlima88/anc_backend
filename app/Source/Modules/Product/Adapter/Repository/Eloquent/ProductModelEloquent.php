<?php

namespace App\Source\Modules\Product\Adapter\Repository\Eloquent;

use App\Source\Shared\Adapter\Repository\ModelBase;

class ProductModelEloquent extends ModelBase
{
  protected $table = 'product';
  protected $fillable = [
    'name',
    'description',
    'sku',
    'price',
  ];
}

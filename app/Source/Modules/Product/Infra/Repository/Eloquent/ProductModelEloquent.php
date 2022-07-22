<?php

namespace App\Source\Modules\Product\Infra\Repository\Eloquent;

use App\Source\Shared\Infra\Repository\ModelBase;

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

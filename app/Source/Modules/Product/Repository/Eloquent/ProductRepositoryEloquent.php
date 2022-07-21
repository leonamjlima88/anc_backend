<?php

namespace App\Source\Modules\Product\Repository\Eloquent;

use App\Source\Modules\Product\Repository\Port\ProductRepositoryInterface;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    public function index(){
        return 'ELOQUENT.index()';
    }
}

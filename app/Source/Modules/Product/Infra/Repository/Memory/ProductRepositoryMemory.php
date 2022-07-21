<?php

namespace App\Source\Modules\Product\Infra\Repository\Memory;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

class ProductRepositoryMemory implements ProductRepositoryInterface
{
    public function index(){
        return "nao implementado";
    }
    
    public function store(ProductEntity $entity){
        return "nao implementado";        
    }
}

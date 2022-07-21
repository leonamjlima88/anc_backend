<?php

namespace App\Source\Modules\Product\Infra\Repository\Eloquent;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    public function index(){
        return 'ELOQUENTxxx.index()';
    }

    public function store(ProductEntity $entity): int {
        // Salva no banco de dados
        // ...

        // Retorna chave primária
        return 1;
    }

    public function show(int $id): ProductEntity
    {
        return ProductEntity::make(1, 'teste');
    }

}

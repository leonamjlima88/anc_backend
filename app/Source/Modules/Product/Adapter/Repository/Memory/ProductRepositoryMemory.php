<?php

namespace App\Source\Modules\Product\Adapter\Repository\Memory;

use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

class ProductRepositoryMemory implements ProductRepositoryInterface
{
    public function __construct(){
        $this->mapper = ProductMapper::make();
    }  
    
    public function index(): array {
        // Não Implementado
        return [];
    }

    public function store(ProductEntity $entity): ProductEntity {
        // Não Implementado
        return new ProductEntity(1, '', '', '', 0, '', '');
    }

    public function show(int $id): ProductEntity|null
    {
        // Não Implementado
        return null;
    }

    public function update(ProductEntity $entity, int $id): ProductEntity
    {
        // Não Implementado
        return new ProductEntity(1, '', '', '', 0, '', '');
    }

    private function findById(int $id)
    {
        // Não Implementado
        return new ProductEntity(1, '', '', '', 0, '', '');
    }

    public function destroy(int $id): bool|null
    {
        // Não Implementado
        return true;
    }
}

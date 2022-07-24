<?php

namespace App\Source\Modules\Stock\Product\Port\Repository;

use App\Source\Modules\Stock\Product\Domain\Entity\ProductEntity;
use App\Source\Shared\Domain\Entity\PageFilter\PageFilterEntity;

interface ProductRepositoryInterface
{
    public function index(): array;
    public function store(ProductEntity $entity): ProductEntity;
    public function show(int $id): ProductEntity|null;
    public function update(ProductEntity $entity, int $id): ProductEntity;
    public function destroy(int $id): bool|null;    
    public function query(PageFilterEntity $pageFilterEntity): array;
}

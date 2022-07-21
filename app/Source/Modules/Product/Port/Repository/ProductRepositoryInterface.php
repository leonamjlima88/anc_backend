<?php

namespace App\Source\Modules\Product\Port\Repository;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;

interface ProductRepositoryInterface
{
    public function index();
    public function store(ProductEntity $entity);
    public function show(int $id): ProductEntity;
}

<?php

namespace App\Source\Modules\Stock\Product\Domain\Service;

use App\Source\Modules\Stock\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\Service\ServiceBase;

final class ProductUpdateService extends ServiceBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(ProductEntity $entity, int $id): ProductEntity {
        return $this->repository->update($entity, $id);
    }
}

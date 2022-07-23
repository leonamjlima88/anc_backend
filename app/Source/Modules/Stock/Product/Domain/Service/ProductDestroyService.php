<?php

namespace App\Source\Modules\Stock\Product\Domain\Service;

use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\Service\ServiceBase;

final class ProductDestroyService extends ServiceBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): bool|null {
        return $this->repository->destroy($id);
    }
}

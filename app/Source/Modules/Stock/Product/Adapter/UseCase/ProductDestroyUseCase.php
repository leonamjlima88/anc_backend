<?php

namespace App\Source\Modules\Stock\Product\Adapter\UseCase;

use App\Source\Modules\Stock\Product\Domain\Service\ProductDestroyService;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\UseCase\UseCaseBase;

final class ProductDestroyUseCase extends UseCaseBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): bool|null {
        return ProductDestroyService::make($this->repository)->execute($id);
    }
}

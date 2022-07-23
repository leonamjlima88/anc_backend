<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class ProductDestroyUseCase extends UseCaseBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): bool|null {
        return $this->repository->destroy($id);
    }
}

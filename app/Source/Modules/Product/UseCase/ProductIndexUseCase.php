<?php

namespace App\Source\Modules\Product\UseCase;

use App\Source\Modules\Product\Repository\Port\ProductRepositoryInterface;

final class ProductIndexUseCase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository) {
        return new ProductIndexUseCase($repository);
    }

    public function execute(){
        return $this->repository->index();
    }
}

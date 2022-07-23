<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class ProductIndexUseCase extends UseCaseBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(): array {
        $entities = $this->repository->index();

        $dtosMapped = [];
        $mapper = ProductMapper::make();
        foreach ($entities as $value) {
            array_push($dtosMapped, $mapper->entityToDto($value));
        }

        return $dtosMapped;
    }
}

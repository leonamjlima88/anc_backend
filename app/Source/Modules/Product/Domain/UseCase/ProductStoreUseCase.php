<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

final class ProductStoreUseCase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(ProductDto $dto): ProductDto {
        $entityMapped = ProductMapper::make()->dtoToEntity($dto);
        $entityStored = $this->repository->store($entityMapped);
        $dtoMapped = ProductMapper::make()->entityToDto($entityStored);

        return $dtoMapped;
    }
}

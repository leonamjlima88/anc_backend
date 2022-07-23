<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class ProductStoreUseCase extends UseCaseBase
{
    private ProductMapper $mapper;
    private function __construct(private ProductRepositoryInterface $repository){
        $this->mapper = ProductMapper::make();
    }

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(ProductDto $dto): ProductDto {
        $entityMapped = $this->mapper->dtoToEntity($dto);
        $entityStored = $this->repository->store($entityMapped);
        $dtoMapped = $this->mapper->entityToDto($entityStored);

        return $dtoMapped;
    }
}
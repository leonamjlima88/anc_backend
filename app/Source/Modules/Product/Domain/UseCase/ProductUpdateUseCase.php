<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class ProductUpdateUseCase extends UseCaseBase
{
    private ProductMapper $mapper;
    private function __construct(private ProductRepositoryInterface $repository){
        $this->mapper = ProductMapper::make();
    }

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(ProductDto $dto, int $id): ProductDto {
        $entityMapped = $this->mapper->dtoToEntity($dto);        
        $entityUpdated = $this->repository->update($entityMapped, $id);
        $dtoMapped = $this->mapper->entityToDto($entityUpdated);

        return $dtoMapped;
    }
}

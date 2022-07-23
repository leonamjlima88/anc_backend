<?php

namespace App\Source\Modules\Stock\Product\Adapter\UseCase;

use App\Source\Modules\Stock\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Stock\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Stock\Product\Domain\Service\ProductStoreService;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\UseCase\UseCaseBase;

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
        $entity = $this->mapper->dtoToEntity($dto);
        $entityStored = ProductStoreService::make($this->repository)->execute($entity);
        $dtoMapped = $this->mapper->entityToDto($entityStored);

        return $dtoMapped;
    }
}
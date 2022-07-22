<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Infra\Dto\ProductDto;
use App\Source\Modules\Product\Infra\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

final class ProductUpdateUseCase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(ProductDto $dto, int $id): ProductDto {
        $entityMapped = ProductMapper::make()->dtoToEntity($dto);        
        $entityUpdated = $this->repository->update($entityMapped, $id);
        $dtoMapped = ProductMapper::make()->entityToDto($entityUpdated);

        return $dtoMapped;
    }
}

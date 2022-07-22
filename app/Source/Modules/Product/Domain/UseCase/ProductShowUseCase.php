<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Domain\Exception\EntityNotFoundException;
use App\Source\Modules\Product\Infra\Dto\ProductDto;
use App\Source\Modules\Product\Infra\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

final class ProductShowUseCase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): ProductDto {
        $entity = $this->repository->show($id);
        throw_if(!$entity, new EntityNotFoundException());

        return ProductMapper::make()->entityToDto($entity);
    }
}

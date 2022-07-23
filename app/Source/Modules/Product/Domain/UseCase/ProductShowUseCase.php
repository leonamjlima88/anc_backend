<?php

namespace App\Source\Modules\Product\Domain\UseCase;

use App\Source\Modules\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\Exception\EntityNotFoundException;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class ProductShowUseCase extends UseCaseBase
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

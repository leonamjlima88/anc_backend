<?php

namespace App\Source\Modules\Stock\Product\Adapter\UseCase;

use App\Source\Modules\Stock\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Stock\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Stock\Product\Domain\Service\ProductShowService;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\Exception\EntityNotFoundException;
use App\Source\Shared\Domain\Service\ServiceBase;

final class ProductShowUseCase extends ServiceBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): ProductDto {
        $entity = ProductShowService::make($this->repository)->execute($id);
        throw_if(!$entity, new EntityNotFoundException());

        return ProductMapper::make()->entityToDto($entity);
    }
}
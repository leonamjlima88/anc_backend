<?php

namespace App\Source\Modules\Stock\Product\Adapter\UseCase;

use App\Source\Modules\Stock\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Stock\Product\Domain\Service\ProductIndexService;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\UseCase\UseCaseBase;

final class ProductIndexUseCase extends UseCaseBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(): array {
        $entities = ProductIndexService::make($this->repository)->execute();
        $dtosMapped = ProductMapper::make()->entityToDtoCollection($entities);

        return $dtosMapped;        
    }
}

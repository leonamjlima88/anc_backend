<?php

namespace App\Source\Modules\Stock\Product\Adapter\UseCase;

use App\Source\Modules\Stock\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Stock\Product\Domain\Service\ProductQueryService;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\Dto\PageFilter\PageFilterDto;
use App\Source\Shared\Adapter\Mapper\PageFilterMapper;
use App\Source\Shared\Adapter\UseCase\UseCaseBase;

final class ProductQueryUseCase extends UseCaseBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(PageFilterDto $pageFilterDto): array {
        $pageFilterEntity = PageFilterMapper::make()->dtoToEntity($pageFilterDto);
        $simpleArray = ProductQueryService::make($this->repository)->execute($pageFilterEntity);
        
        return $simpleArray;        
    }
}

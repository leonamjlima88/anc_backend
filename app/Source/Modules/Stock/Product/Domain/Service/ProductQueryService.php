<?php

namespace App\Source\Modules\Stock\Product\Domain\Service;

use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Domain\Entity\PageFilter\PageFilterEntity;
use App\Source\Shared\Domain\Service\ServiceBase;

final class ProductQueryService extends ServiceBase
{
    private function __construct(private ProductRepositoryInterface $repository){}

    public static function make(ProductRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(PageFilterEntity $pageFilterEntity): array {
        return $this->repository->query($pageFilterEntity);
    }
}

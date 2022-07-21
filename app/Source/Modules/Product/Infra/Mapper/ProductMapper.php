<?php

namespace App\Source\Modules\Product\Infra\Mapper;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Infra\Dto\ProductDto;

final class ProductMapper
{
  static public function make(): self
  {
    return new self();
  }
  
  public function mapFrom(ProductDto $dto): ProductEntity
  {
    return ProductEntity::make(
      $dto->id,
      $dto->name,
    );
  }
  
  public function mapTo(ProductEntity $entity): ProductDto
  {
    return new ProductDto(
      $entity->id,
      $entity->name,
    );
  }
}
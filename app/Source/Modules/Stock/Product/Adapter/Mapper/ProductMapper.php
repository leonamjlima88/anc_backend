<?php

namespace App\Source\Modules\Stock\Product\Adapter\Mapper;

use App\Source\Modules\Stock\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Stock\Product\Adapter\Dto\ProductDto;
use Illuminate\Database\Eloquent\Model;

final class ProductMapper
{
  private function __construct(){}
  
  static public function make(): self
  {
    return new self();
  }
  
  public function dtoToEntity(ProductDto $dto): ProductEntity
  {
    return new ProductEntity(...$dto->toArray());
  }
  
  public function entityToDto(ProductEntity $entity): ProductDto
  {
    return new ProductDto(...$entity->toArray());
  }

  public function modelToEntity(Model $model): ProductEntity
  {
    return new ProductEntity(...$model->toArray());
  }
}
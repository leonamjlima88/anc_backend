<?php

namespace App\Source\Modules\Product\Infra\Mapper;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Infra\Dto\ProductDto;
use Illuminate\Database\Eloquent\Model;

final class ProductMapper
{
  static public function make(): self
  {
    return new self();
  }
  
  public function dtoToEntity(ProductDto $dto): ProductEntity
  {
    return new ProductEntity(
      $dto->id,
      $dto->name,
      $dto->description,
      $dto->sku,
      $dto->price,
      $dto->created_at,
      $dto->updated_at,
    );    
  }
  
  public function entityToDto(ProductEntity $entity): ProductDto
  {
    return new ProductDto(
      $entity->id,
      $entity->name,
      $entity->description,
      $entity->sku,
      $entity->price,
      $entity->created_at,
      $entity->updated_at,
    );
  }

  public function modelToEntity(Model $model): ProductEntity
  {
    return new ProductEntity(
      $model->id,
      $model->name,
      $model->description,
      $model->sku,
      $model->price,
      $model->created_at,
      $model->updated_at,
    );    
  }
}
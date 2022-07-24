<?php

namespace App\Source\Modules\Stock\Product\Adapter\Mapper;

use App\Source\Modules\Stock\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Stock\Product\Adapter\Dto\ProductDto;

final class ProductMapper
{
  private function __construct(){}
  
  public static function make(): self
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

  public function entityToDtoCollection(array $entities): array
  {
    $dtosMapped = [];
    foreach ($entities as $value) 
      array_push($dtosMapped, $this->entityToDto($value));    

    return $dtosMapped;
  }  
}
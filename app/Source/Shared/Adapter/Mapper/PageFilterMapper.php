<?php

namespace App\Source\Shared\Adapter\Mapper;

use App\Source\Shared\Adapter\Dto\PageFilter\Enum\DirectionEnum;
use App\Source\Shared\Adapter\Dto\PageFilter\PageFilterDto;
use App\Source\Shared\Domain\Entity\PageFilter\PageFilterEntity;

final class PageFilterMapper
{
  private function __construct(){}
  
  static public function make(): self
  {
    return new self();
  }
  
  public function dtoToEntity(PageFilterDto $dto): PageFilterEntity
  {
    $entity = PageFilterEntity::make()
      ->openPage()
        ->config(
          $dto->page->isPaginate,
          $dto->page->limit,
          $dto->page->current,
          $dto->page->columns)
      ->end()
      ->openFilter()
        ->addWhereCollection($dto->filter->where->toArray())
      ->end();
        
    return $entity;
  }
  
  // public function entityToDto(PageFilterEntity $entity): PageFilterDto
  // {
  //   return new PageFilterDto(...$entity->toArray());
  // }  
}
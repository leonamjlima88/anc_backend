<?php

namespace App\Source\Shared\Adapter\Mapper;

use App\Source\Shared\Adapter\Dto\PageFilter\PageFilterDto;
use App\Source\Shared\Domain\Entity\PageFilter\PageFilterEntity;

final class PageFilterMapper
{
  private function __construct(){}
  
  public static  function make(): self
  {
    return new self();
  }
  
  public function dtoToEntity(PageFilterDto $dto): PageFilterEntity
  {
    $entity = PageFilterEntity::make();
    
    if ($dto->page)             $entity->openPage()->config(...$dto->page?->toArray());
    if ($dto->filter?->where)   $entity->openFilter()->addWhereCollection($dto->filter->where->toArray());    
    if ($dto->filter?->orWhere) $entity->openFilter()->addOrWhereCollection($dto->filter->orWhere->toArray());    
    if ($dto->filter?->orderBy) $entity->openFilter()->addOrderByCollection($dto->filter->orderBy->toArray());    
        
    return $entity;
  }
}
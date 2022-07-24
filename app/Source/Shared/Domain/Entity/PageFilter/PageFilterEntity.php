<?php

namespace App\Source\Shared\Domain\Entity\PageFilter;

final class PageFilterEntity
{
  public function __construct(
    public ?PageEntity $page,
    public ?FilterEntity $filter,        
  ) {
  }

  public static function make(): self {
    return new Self(
      new PageEntity(), 
      new FilterEntity()
    );
  }

  public function openPage(){
    $this->page->setOwner($this);
    return $this->page;
  }  

  public function openFilter(){
    $this->filter->setOwner($this);
    return $this->filter;
  }  
}
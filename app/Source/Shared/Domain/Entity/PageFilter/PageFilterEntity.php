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

// Exemplo de uso:
// $filters = PageFilterEntity::make()
//   ->openPage()
//     ->config(true, 5, 1, ['teste1', 'teste2', 'teste3'])
//   ->end()
//   ->openFilter()
//     ->addWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//     ->addWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//     ->addWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//     ->addOrWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//     ->addOrWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//     ->addOrWhere('product.name', OperatorEnum::LIKE_ANYWHERE, ['teste', 'teste2'])
//   ->end();

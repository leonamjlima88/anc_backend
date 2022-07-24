<?php

namespace App\Source\Shared\Adapter\Dto\PageFilter;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class PageFilterDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable')]
    public ?PageDto $page,
    
    #[Rule('nullable')]
    public ?FilterDto $filter,        
  ) {
  }

  /**
   * Utilizado para extrair dados formatados se necessário
   *
   * @return array
   */
  public function toResource(): array
  {
    return parent::toArray();
  }
}

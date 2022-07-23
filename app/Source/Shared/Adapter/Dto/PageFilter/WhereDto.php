<?php

namespace App\Source\Shared\Adapter\Dto\PageFilter;

use App\Source\Shared\Adapter\Dto\PageFilter\Enum\OperatorEnum;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class WhereDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('required|string')]
    public string $fieldName,

    public string $operator,

    #[Rule('required|array')]
    public array $fieldValue,    
  ) {
  }

  // Regras de validação
  public static function rules(): array
  {
    return [
      'operator' => [
        'required',
        new Enum(OperatorEnum::class)
      ],
    ];
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

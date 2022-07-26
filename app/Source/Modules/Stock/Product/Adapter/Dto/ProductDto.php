<?php

namespace App\Source\Modules\Stock\Product\Adapter\Dto;

use Illuminate\Validation\Rule as ValidationRule;
use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class ProductDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('required|string|max:80')]
    public string $name,

    #[Rule('nullable|string')]
    public ?string $description,

    public string $sku,

    #[Rule('nullable|numeric|min:0')]
    public ?float $price,

    #[Rule('nullable|string|min:10')]
    public ?string $created_at,

    #[Rule('nullable|string|min:10')]
    public ?string $updated_at,
  ) {
  }

  public static function rules(): array
  {
    return [
      'sku' => [
        'required',
        'string',
        'max:36',
        ValidationRule::unique('product', 'sku')->ignore(getRouteParameter()),
      ],
    ];
  }

  public static function messages(): array
  {
    return [
      'sku.required' => trans(
        'request_validation_lang.field_is_required', ['value' => 'Código de Referência']
      ),
      'sku.unique' => trans(
        'request_validation_lang.field_is_unique', ['value' => 'Código de Referência']
      ),
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

<?php

namespace App\Source\Modules\User\Adapter\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class UserDto extends Data
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

    #[Rule('required|string|max:255|email')]
    public string $email,

    #[Rule('nullable|string|min:10')]
    public ?string $created_at,

    #[Rule('nullable|string|min:10')]
    public ?string $updated_at,
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

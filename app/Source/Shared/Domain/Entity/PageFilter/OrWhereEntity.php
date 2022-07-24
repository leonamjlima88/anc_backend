<?php

namespace App\Source\Shared\Domain\Entity\PageFilter;

use App\Source\Shared\Adapter\Dto\PageFilter\Enum\OperatorEnum;

final class OrWhereEntity
{
  public function __construct(
    public string $fieldName,
    public OperatorEnum $operator,
    public array $fieldValue,    
  ) {
  }
}

<?php

namespace App\Source\Shared\Domain\Entity\PageFilter;

use App\Source\Shared\Adapter\Dto\PageFilter\Enum\DirectionEnum;

final class OrderByEntity
{
  public function __construct(
    public string $fieldName,
    public DirectionEnum $direction,
  ) {
  }
}

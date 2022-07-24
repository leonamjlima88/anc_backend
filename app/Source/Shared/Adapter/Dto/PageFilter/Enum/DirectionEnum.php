<?php

namespace App\Source\Shared\Adapter\Dto\PageFilter\Enum;

use App\Source\Shared\Domain\Trait\EnumEnhancements;

enum DirectionEnum: string
{
  use EnumEnhancements;
  
  case NONE = '';
  case ASC = 'asc';
  case DESC = 'desc';
}
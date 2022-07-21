<?php

namespace App\Source\Modules\Product\Domain\Entity;

final class ProductEntity
{
  private function __construct(
    public ?int $id,
    public string $name,
  ){}

  static public function make(
    ?int $id,
    string $name,
  ): self {
    return new self($id, $name);
  }
}

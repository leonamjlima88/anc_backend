<?php

namespace App\Source\Modules\Stock\Product\Domain\Entity;

final class ProductEntity
{
  public function __construct(
    public ?int    $id,
    public string  $name,
    public ?string $description,
    public string  $sku,
    public ?float  $price,
    public ?string $created_at,
    public ?string $updated_at,
  ){}

  public function toArray()
  {
    return (array) $this;
  }

  static public function fromArray(array $data)
  {
    return new self(...$data);
  }
}
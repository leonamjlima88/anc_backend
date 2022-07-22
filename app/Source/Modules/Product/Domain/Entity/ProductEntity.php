<?php

namespace App\Source\Modules\Product\Domain\Entity;

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
    return [
      "id"          => $this->id,
      "name"        => $this->name,
      "description" => $this->description,
      "sku"         => $this->sku,
      "price"       => $this->price,
      "created_at"  => $this->created_at,
      "updated_at"  => $this->updated_at,
    ];
  }

  public function fromArray(array $data)
  {
    $this->id          = $data['id'];
    $this->name        = $data['name'];
    $this->description = $data['description'];
    $this->sku         = $data['sku'];
    $this->price       = $data['price'];
    $this->created_at  = $data['created_at'];
    $this->updated_at  = $data['updated_at'];
  }
}

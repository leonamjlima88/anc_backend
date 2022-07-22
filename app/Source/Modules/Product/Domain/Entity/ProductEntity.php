<?php

namespace App\Source\Modules\Product\Domain\Entity;

final class ProductEntity
{
  public function __construct(
    public ?int $id,
    public string $name,
    public ?string $created_at,
    public ?string $updated_at,
  ){}

  public function toArray()
  {
    return [
      "id"         => $this->id,
      "name"       => $this->name,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
    ];
  }

  public function fromArray(array $data)
  {
    $this->id         = $data['id'];
    $this->name       = $data['name'];
    $this->created_at = $data['created_at'];
    $this->updated_at = $data['updated_at'];
  }
}

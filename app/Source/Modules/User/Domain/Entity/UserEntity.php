<?php

namespace App\Source\Modules\User\Domain\Entity;

final class UserEntity
{
  public function __construct(
    public ?int    $id,
    public string  $name,
    public string  $email,
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
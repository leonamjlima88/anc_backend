<?php

namespace App\Source\Modules\User\Adapter\Mapper;

use App\Source\Modules\User\Domain\Entity\UserEntity;
use App\Source\Modules\User\Adapter\Dto\UserDto;
use Illuminate\Database\Eloquent\Model;

final class UserMapper
{
  private function __construct(){}
  
  static public function make(): self
  {
    return new self();
  }
  
  public function dtoToEntity(UserDto $dto): UserEntity
  {
    return new UserEntity(...$dto->toArray());
  }
  
  public function entityToDto(UserEntity $entity): UserDto
  {
    return new UserDto(...$entity->toArray());
  }

  public function modelToEntity(Model $model): UserEntity
  {
    return new UserEntity(...$model->toArray());
  }
}
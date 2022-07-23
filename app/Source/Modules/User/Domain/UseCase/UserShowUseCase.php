<?php

namespace App\Source\Modules\User\Domain\UseCase;

use App\Source\Modules\User\Adapter\Dto\UserDto;
use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Domain\Exception\EntityNotFoundException;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class UserShowUseCase extends UseCaseBase
{
    private function __construct(private UserRepositoryInterface $repository){}

    public static function make(UserRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): UserDto {
        $entity = $this->repository->show($id);
        throw_if(!$entity, new EntityNotFoundException());

        return UserMapper::make()->entityToDto($entity);
    }
}

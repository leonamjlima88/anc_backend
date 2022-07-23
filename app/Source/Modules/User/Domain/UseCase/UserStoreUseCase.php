<?php

namespace App\Source\Modules\User\Domain\UseCase;

use App\Source\Modules\User\Adapter\Dto\UserDto;
use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class UserStoreUseCase extends UseCaseBase
{
    private UserMapper $mapper;
    private function __construct(private UserRepositoryInterface $repository){
        $this->mapper = UserMapper::make();
    }

    public static function make(UserRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(UserDto $dto): UserDto {
        $entityMapped = $this->mapper->dtoToEntity($dto);
        $entityStored = $this->repository->store($entityMapped);
        $dtoMapped = $this->mapper->entityToDto($entityStored);

        return $dtoMapped;
    }
}
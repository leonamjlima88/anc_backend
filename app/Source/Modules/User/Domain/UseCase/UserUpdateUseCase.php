<?php

namespace App\Source\Modules\User\Domain\UseCase;

use App\Source\Modules\User\Adapter\Dto\UserDto;
use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class UserUpdateUseCase extends UseCaseBase
{
    private UserMapper $mapper;
    private function __construct(private UserRepositoryInterface $repository){
        $this->mapper = UserMapper::make();
    }

    public static function make(UserRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(UserDto $dto, int $id): UserDto {
        $entityMapped = $this->mapper->dtoToEntity($dto);        
        $entityUpdated = $this->repository->update($entityMapped, $id);
        $dtoMapped = $this->mapper->entityToDto($entityUpdated);

        return $dtoMapped;
    }
}

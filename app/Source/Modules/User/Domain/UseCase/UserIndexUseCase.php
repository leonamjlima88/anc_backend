<?php

namespace App\Source\Modules\User\Domain\UseCase;

use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class UserIndexUseCase extends UseCaseBase
{
    private function __construct(private UserRepositoryInterface $repository){}

    public static function make(UserRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(): array {
        $entities = $this->repository->index();

        $dtosMapped = [];
        $mapper = UserMapper::make();
        foreach ($entities as $value) {
            array_push($dtosMapped, $mapper->entityToDto($value));
        }

        return $dtosMapped;
    }
}

<?php

namespace App\Source\Modules\User\Domain\UseCase;

use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Domain\UseCase\UseCaseBase;

final class UserDestroyUseCase extends UseCaseBase
{
    private function __construct(private UserRepositoryInterface $repository){}

    public static function make(UserRepositoryInterface $repository): self {
        return new self($repository);
    }

    public function execute(int $id): bool|null {
        return $this->repository->destroy($id);
    }
}

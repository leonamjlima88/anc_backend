<?php

namespace App\Source\Modules\User\Port\Repository;

use App\Source\Modules\User\Domain\Entity\UserEntity;

interface UserRepositoryInterface
{
    public function index(): array;
    public function store(UserEntity $entity): UserEntity;
    public function show(int $id): UserEntity|null;
    public function update(UserEntity $entity, int $id): UserEntity;
    public function destroy(int $id): bool|null;
}

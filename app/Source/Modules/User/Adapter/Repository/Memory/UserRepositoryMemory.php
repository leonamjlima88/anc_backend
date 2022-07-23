<?php

namespace App\Source\Modules\User\Adapter\Repository\Memory;

use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Domain\Entity\UserEntity;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;

class UserRepositoryMemory implements UserRepositoryInterface
{
    public function __construct(){
        $this->mapper = UserMapper::make();
    }  
    
    public function index(): array {
        // Não Implementado
        return [];
    }

    public function store(UserEntity $entity): UserEntity {
        // Não Implementado
        return new UserEntity(1, '', '', '', 0, '', '');
    }

    public function show(int $id): UserEntity|null
    {
        // Não Implementado
        return null;
    }

    public function update(UserEntity $entity, int $id): UserEntity
    {
        // Não Implementado
        return new UserEntity(1, '', '', '', 0, '', '');
    }

    private function findById(int $id)
    {
        // Não Implementado
        return new UserEntity(1, '', '', '', 0, '', '');
    }

    public function destroy(int $id): bool|null
    {
        // Não Implementado
        return true;
    }
}

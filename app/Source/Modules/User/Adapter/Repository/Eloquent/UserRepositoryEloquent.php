<?php

namespace App\Source\Modules\User\Adapter\Repository\Eloquent;

use App\Source\Modules\User\Domain\Entity\UserEntity;
use App\Source\Modules\User\Adapter\Mapper\UserMapper;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    private UserMapper $mapper;
    public function __construct(private Model $model){
        $this->mapper = UserMapper::make();
    }  
    
    public function index(): array {
        $models = $this->model->get();

        $entities = [];
        foreach ($models as $value) {
            array_push($entities, $this->mapper->modelToEntity($value));
        }

        return $entities; 
    }

    public function store(UserEntity $entity): UserEntity {
        $modelCreated = $this->model->create($entity->toArray());
        $entityMapped = $this->mapper->modelToEntity($modelCreated);

        return $entityMapped;
    }

    public function show(int $id): UserEntity|null
    {
        return ($modelFound = $this->findById($id))
         ? $this->mapper->modelToEntity($modelFound)
         : null;        
    }

    public function update(UserEntity $entity, int $id): UserEntity
    {
        $model = $this->findById($id);
        tap($model)->update($entity->toArray());
        $entity = $this->mapper->modelToEntity($model);

        return $entity;        
    }

    private function findById(int $id): Model|null
    {
        return $this->model->where('id', $id)->first();
    }

    public function destroy(int $id): bool|null
    {
        return ($modelFound = $this->model->find($id)) 
            ? $modelFound->delete() 
            : false;
    }
}

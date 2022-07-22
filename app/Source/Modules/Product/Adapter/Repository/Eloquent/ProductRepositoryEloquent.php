<?php

namespace App\Source\Modules\Product\Adapter\Repository\Eloquent;

use App\Source\Modules\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    private ProductModelEloquent $model;
    private ProductMapper $mapper;

    public function __construct(){
        $this->model = new ProductModelEloquent();
        $this->mapper = ProductMapper::make();
    }  
    
    public function index(): array {
        $models = $this->model->get();

        $entities = [];
        foreach ($models as $value) {
            array_push($entities, $this->mapper->modelToEntity($value));
        }

        return $entities; 
    }

    public function store(ProductEntity $entity): ProductEntity {
        $modelCreated = $this->model->create($entity->toArray());
        $entityMapped = $this->mapper->modelToEntity($modelCreated);

        return $entityMapped;
    }

    public function show(int $id): ProductEntity|null
    {
        return ($modelFound = $this->findById($id))
         ? $this->mapper->modelToEntity($modelFound)
         : null;        
    }

    public function update(ProductEntity $entity, int $id): ProductEntity
    {
        $model = $this->findById($id);
        tap($model)->update($entity->toArray());
        $entity = $this->mapper->modelToEntity($model);

        return $entity;        
    }

    private function findById(int $id): ProductModelEloquent|null
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

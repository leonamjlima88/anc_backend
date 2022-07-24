<?php

namespace App\Source\Modules\Stock\Product\Adapter\Repository\Eloquent;

use App\Source\Modules\Stock\Product\Domain\Entity\ProductEntity;
use App\Source\Modules\Stock\Product\Adapter\Mapper\ProductMapper;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\Repository\Eloquent\GenericQueryEloquent;
use App\Source\Shared\Domain\Entity\PageFilter\PageFilterEntity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    private ProductMapper $mapper;
    public function __construct(private Model $model){
        $this->mapper = ProductMapper::make();
    }  
    
    public function index(): array {
        $models = $this->model->get();
        $entities = $this->modelToEntityCollection($models);

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

    public function query(PageFilterEntity $pageFilterEntity): array
    {
        return GenericQueryEloquent::make($pageFilterEntity, $this->model)->execute();
    }

    private function modelToEntity(Model $model): ProductEntity {
        $entity = new ProductEntity(...$model->toArray());

        return $entity;
    }

    private function modelToEntityCollection(Collection $models): array {
        $entities = [];
        foreach ($models as $value)
            array_push($entities, $this->modelToEntity($value));        

        return $entities;
    }
}

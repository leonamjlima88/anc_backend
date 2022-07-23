<?php

namespace App\Providers;

use App\Source\Modules\Stock\Product\Adapter\Repository\Eloquent\ProductModelEloquent;
use App\Source\Modules\Stock\Product\Adapter\Repository\Eloquent\ProductRepositoryEloquent;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // ProductRepositoryEloquent
        $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryEloquent::class);
        $this->app->bind(ProductRepositoryInterface::class, function(){
            return new ProductRepositoryEloquent(new ProductModelEloquent());
        });        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

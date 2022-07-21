<?php

namespace App\Providers;

use App\Source\Modules\Product\Repository\Eloquent\ProductRepositoryEloquent;
use App\Source\Modules\Product\Repository\Port\ProductRepositoryInterface;
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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryEloquent::class);        
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

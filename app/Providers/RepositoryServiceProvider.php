<?php

namespace App\Providers;

use App\Source\Modules\Product\Adapter\Repository\Eloquent\ProductRepositoryEloquent;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
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
        // $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryMemory::class);
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

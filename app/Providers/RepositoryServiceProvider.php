<?php

namespace App\Providers;

use App\Source\Modules\Product\Adapter\Repository\Eloquent\ProductModelEloquent;
use App\Source\Modules\Product\Adapter\Repository\Eloquent\ProductRepositoryEloquent;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
// use App\Source\Modules\User\Adapter\Repository\Eloquent\UserModelEloquent;
// use App\Source\Modules\User\Adapter\Repository\Eloquent\UserRepositoryEloquent;
// use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
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

        // // UserRepositoryEloquent
        // $this->app->bind(UserRepositoryInterface::class, UserRepositoryEloquent::class);
        // $this->app->bind(UserRepositoryInterface::class, function(){
        //     return new UserRepositoryEloquent(new UserModelEloquent());
        // });
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

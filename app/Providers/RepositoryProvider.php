<?php

namespace App\Providers;

use App\Repositories\Eloquent\BasketRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\BasketRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BasketRepositoryInterface::class, BasketRepository::class);
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

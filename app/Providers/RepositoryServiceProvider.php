<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductImageRepository::class, \App\Repositories\ProductImageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LinkRepository::class, \App\Repositories\LinkRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MarketplaceRepository::class, \App\Repositories\MarketplaceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OfferRepository::class, \App\Repositories\OfferRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClientRepository::class, \App\Repositories\ClientRepositoryEloquent::class);
        //:end-bindings:
    }
}

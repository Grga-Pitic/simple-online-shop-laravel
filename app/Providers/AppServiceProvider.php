<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Product\ProductRepository;
use App\Services\Product\ProductSqlRepository as ProductProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(ProductRepository::class, ProductTestRepository::class);
        $this->app->singleton(ProductRepository::class, function($app){
            return new ProductProvider();
        });
    }
}

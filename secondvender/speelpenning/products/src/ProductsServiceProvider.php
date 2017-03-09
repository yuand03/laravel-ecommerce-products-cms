<?php

namespace Speelpenning\Products;

use Illuminate\Support\ServiceProvider;
use Speelpenning\Contracts\Products\Repositories\AttributeRepository as AttributeRepositoryContract;
use Speelpenning\Contracts\Products\Repositories\AttributeValueRepository as AttributeValueRepositoryContract;
use Speelpenning\Contracts\Products\Repositories\ProductRepository as ProductRepositoryContract;
use Speelpenning\Contracts\Products\Repositories\ProductTypeRepository as ProductTypeRepositoryContract;
use Speelpenning\Products\Repositories\AttributeRepository;
use Speelpenning\Products\Repositories\AttributeValueRepository;
use Speelpenning\Products\Repositories\ProductRepository;
use Speelpenning\Products\Repositories\ProductTypeRepository;
use Speelpenning\Contracts\Products\ProductType as ProductTypeInterface ;
use Speelpenning\Products\ProductType;
use Speelpenning\Contracts\Products\Product as ProductsInterface ;
use Speelpenning\Products\Product;

class ProductsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'products');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        //$this->publishMigrations();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/products.php', 'products');
        $this->bindRepositories();
        $this->app->singleton(ProductTypeInterface::class, ProductType::class);
        $this->app->singleton(ProductInterface::class, Product::class);
    }

    /**
     * Binds the repository abstracts to the actual implementations.
     */
    protected function bindRepositories()
    {
        $bindings = [
            AttributeRepositoryContract::class      => AttributeRepository::class,
            AttributeValueRepositoryContract::class => AttributeValueRepository::class,
            ProductRepositoryContract::class        => ProductRepository::class,
            ProductTypeRepositoryContract::class    => ProductTypeRepository::class,
        ];

        foreach ($bindings as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }
    }

    /**
     * Publishes the migrations.
     */
    protected function publishMigrations()
    {
        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }
}

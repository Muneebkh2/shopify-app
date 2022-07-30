<?php

namespace App\Providers;

use App\Client\ShopifySessionStorage;
use Illuminate\Support\ServiceProvider;
use Shopify\Context;

class ShopifyServiceProvider extends ServiceProvider
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
        // Context::initialize(
        //     config('shopify.api.key'),
        //     config('shopify.api.token'),
        //     env('SHOPIFY_API_SCOPES'),
        //     config('shopify.store_url'),
        //     new ShopifySessionStorage(),
        //     config('shopify.api.version'),
        //     false,
        //     false,
        // );
    }
}

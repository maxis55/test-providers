<?php

namespace App\Providers;

use App\Helpers\AnotherTestProviderHelper;
use App\Helpers\ProviderHelperContract;
use App\Helpers\TestProviderHelper;
use Illuminate\Support\ServiceProvider;

class TestProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProviderHelperContract::class,
            function () {

                if (\request()->has('another')) {
                    return new AnotherTestProviderHelper();
                }
                return new TestProviderHelper();

            }
        );
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

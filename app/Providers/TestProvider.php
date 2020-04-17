<?php

namespace App\Providers;

use App\Helpers\AnotherTestProviderHelper;
use App\Helpers\ProviderHelperContract;
use App\Helpers\TestProviderHelper;
use App\Models\Order;
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

        $this->app->singleton(Order::class, function () {
            //theoretically of current user, working on specific order
            $order_users=Order::all()->pluck('user_id')->unique();
            $order=Order::where('user_id',$order_users->random())->get()->random();

            return $order;
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

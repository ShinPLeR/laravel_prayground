<?php

namespace App\Providers;

use App\Clients\ApiClientInterface;
use App\Clients\MockOpenAIClient;
use App\Clients\OpenAIClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApiClientInterface::class, function () {
            if (config('app.env') === 'production') {
                return new OpenAIClient();
            } else {
                return new MockOpenAIClient();
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

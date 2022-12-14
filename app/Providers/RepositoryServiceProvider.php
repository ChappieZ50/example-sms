<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\BaseContract', 'App\Repositories\BaseRepository');
        $this->app->bind('App\Contracts\UserContract', 'App\Repositories\UserRepository');
        $this->app->bind('App\Contracts\SmsContract', 'App\Repositories\SmsRepository');
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

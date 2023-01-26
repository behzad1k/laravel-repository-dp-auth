<?php

namespace App\Providers;

use App\Contracts\BaseContract;
use App\Contracts\ProfileContract;
use App\Contracts\UserContract;
use App\Repositories\BaseRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(BaseContract::class, BaseRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->bind(ProfileContract::class, ProfileRepository::class);
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

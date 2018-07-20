<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param UserRepository $userRepository
     * @return void
     */
    public function boot(UserRepository $userRepository)
    {
        Schema::defaultStringLength(191);

        Validator::extend('email_active', function ($attribute, $value, $parameters, $validator) use ($userRepository) {
            return !$userRepository->find(['email' => $value, 'active' => true], true) instanceof User;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

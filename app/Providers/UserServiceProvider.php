<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(User $user)
{
        \View::composer('*', function($view){
            $view->with('currentUser', \Auth::user())
                ->with('avatar', \Auth::user()->avatarDir());
    });
        
}

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Channel;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view) {
            $channels = \Cache::rememberForever('channels', function() {
               return Channel::all();
            });
         $view->with('channels', $channels);
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
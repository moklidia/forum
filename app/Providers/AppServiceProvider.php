<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive(
            'class', function ($average) {
            
                return '<?php 
                if ((' . $average . ' >= 4.5) && (' . $average . ' <= 5))
                    $textClass = "text-success";
                elseif ((' . $average . ' > 3) && (' . $average . ' < 4.5))
                    $textClass = "text-warning";
                elseif (' . $average . ' <= 3)
                    $textClass = "text-danger";
                echo $textClass;
            ?>';
            }
        );
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

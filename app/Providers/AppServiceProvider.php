<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

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
        $css = asset('/public/assets/css').'/';
        $css2 = asset('/public/css').'/';
        $js = asset('/public/assets/js').'/';
        $js2 = asset('/public/js').'/';
        $font = asset('/public/assets/fonts').'/';
        $images = asset('/public/assets/images').'/';
        $plugin = asset('/public/assets/plugin').'/';

        View::share('css',$css);
        View::share('css2',$css2);
        View::share('js',$js);
        View::share('js2',$js2);
        View::share('font',$font);
        View::share('images',$images);
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

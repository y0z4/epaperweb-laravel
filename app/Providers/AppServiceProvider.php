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
        $url        = 'http://dev.topskor.id/epaper.topskor.id/';
        $css = secure_asset('/public/assets/css').'/';
        $css2 = secure_asset('/public/css').'/';
        $js = secure_asset('/public/assets/js').'/';
        $js2 = secure_asset('/public/js').'/';
        $font = secure_asset('/public/assets/fonts').'/';
        $images = secure_asset('/public/assets/images').'/';
        $plugin = secure_asset('/public/assets/plugin').'/';

        View::share('url',$url);
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

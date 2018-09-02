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
        $url        = 'https://dev.topskor.id/epaper.topskor.id/';
        $css = secure_asset('/public/assets/css').'/';
        $ecss = secure_asset('/public/assets/epaper/css').'/';
        $css2 = secure_asset('/public/css').'/';
        $js = secure_asset('/public/assets/js').'/';
        $ejs = secure_asset('/public/assets/epaper/js').'/';
        $js2 = secure_asset('/public/js').'/';
        $mp3 = secure_asset('/public/assets/epaper/mp3').'/';
        $pdf = secure_asset('/public/assets/epaper/pdf').'/';
        $font = secure_asset('/public/assets/fonts').'/';
        $efont = secure_asset('/public/assets/epaper/webfonts').'/';
        $images = secure_asset('/public/assets/images').'/';
        $eimages = secure_asset('/public/assets/epaper/images').'/';
        $plugin = secure_asset('/public/assets/plugin').'/';

        View::share('url',$url);
        View::share('css',$css);
        View::share('ecss',$ecss);
        View::share('css2',$css2);
        View::share('js',$js);
        View::share('ejs',$ejs);
        View::share('mp3',$mp3);
        View::share('pdf',$pdf);
        View::share('efont',$efont);
        View::share('eimages',$eimages);
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

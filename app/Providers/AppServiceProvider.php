<?php

namespace App\Providers;

use App\View\Components\cms\text;
use App\View\Components\cms\select;
use App\View\Components\cms\checkbox;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('text', text::class);
        Blade::component('select', select::class);
        Blade::component('checkbox', checkbox::class);
    }
}

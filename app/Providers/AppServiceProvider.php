<?php

namespace App\Providers;

use App;
use App\Models\Language;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!App::runningInConsole()) {
            $languages = Language::all();
            View::share('languages', $languages->count() ? $languages : []);
        }
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

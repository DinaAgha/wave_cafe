<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Msg; 

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('adminIncludes.topnav', function ($view) {
            $unreadMessages = Msg::where('read', false)->get(); // Fetch unread messages
            $view->with('unreadMessages', $unreadMessages); // Share the variable with the view
        });
    }
}

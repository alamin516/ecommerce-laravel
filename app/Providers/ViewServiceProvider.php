<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       // Share cart count across views that use the header
       View::composer('layouts.navigation', function ($view) {
        $user = Auth::user();
        $count = 0;

        if ($user) {
            $count = Cart::where('user_id', $user->id)->count();
        }

        $view->with('count', $count);
    });
    }
}

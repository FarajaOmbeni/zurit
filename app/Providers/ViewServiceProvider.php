<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog;

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
        //
        view()->composer('*', function ($view) {
            $recentBlogs = Blog::orderBy('created_at', 'desc')->take(5)->get();
            $view->with('recentBlogs', $recentBlogs);
        });
    }
}

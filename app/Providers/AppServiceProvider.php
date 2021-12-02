<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Quote;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        // Paginator::useBootstrap();

        View::composer("templates.master", function ($view) {
            $view->with('route', Route::currentRouteName());
        });

        View::composer("templates.refresher", function ($view) {

            $popular_quote = Quote::popular()->inRandomOrder()->first();
            $popular_author = Author::popular()->where('id', '!=', $popular_quote->author_id)->inRandomOrder()->first();

            $view->with("popular_quote", $popular_quote)
                ->with("popular_author", $popular_author);
        });
    }
}

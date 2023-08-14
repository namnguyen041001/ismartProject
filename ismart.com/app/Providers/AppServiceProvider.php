<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Cat_post;
use App\Models\Order_detail;

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
    public function boot(): void
    {
        $menu_cat = Cat_post::where('parent_id',0)->get();
        $best_selling = Order_detail::selectRaw("COUNT('id') as total, id_product")
        ->groupBy('id_product')->orderBy('total','desc')->limit(5)->get();
        View::share('menu_cat',$menu_cat);
        View::share('best_selling',$best_selling);

        Paginator::useBootstrap();
    }
}

<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::share('categories',$categories=Category::all());
        View::share('subcategories',$subcategories=SubCategory::all());
        View::share('brands',$brands=Brand::all());
    }
}

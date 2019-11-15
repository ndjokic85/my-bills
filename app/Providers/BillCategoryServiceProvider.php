<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BillCategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->when('App\Http\Controllers\BillCategoryController')
            ->needs('App\Repositories\BillCategoryRepositoryInterface')
            ->give('App\Repositories\BillCategoryRepository');
    }
}

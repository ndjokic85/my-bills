<?php

namespace App\Providers\Front;

use Illuminate\Support\ServiceProvider;

class BillCategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->when('App\Http\Controllers\Front\BillCategoryController')
            ->needs('App\Repositories\Front\BillCategoryRepositoryInterface')
            ->give('App\Repositories\Front\BillCategoryRepository');
    }
}

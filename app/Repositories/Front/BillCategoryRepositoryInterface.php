<?php

namespace App\Repositories\Front;

interface BillCategoryRepositoryInterface
{
    public function all();
    public function latest();
    public function first();
}

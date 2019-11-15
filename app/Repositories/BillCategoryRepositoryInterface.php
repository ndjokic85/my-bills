<?php

namespace App\Repositories;

interface BillCategoryRepositoryInterface
{
    public function all();
    public function latest();
    public function first();
}

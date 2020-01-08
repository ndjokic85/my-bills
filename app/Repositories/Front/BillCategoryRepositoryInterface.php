<?php

namespace App\Repositories\Front;

use Illuminate\Http\Request;

interface BillCategoryRepositoryInterface
{
    public function all();
    public function latest();
    public function first();
    public function store(Request $request);
    public function update(Request $request);
}

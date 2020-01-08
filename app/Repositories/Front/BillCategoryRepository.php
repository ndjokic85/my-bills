<?php

namespace App\Repositories\Front;

use App\Model\Front\BillCategory;
use Illuminate\Http\Request;

class BillCategoryRepository implements BillCategoryRepositoryInterface
{
  protected $billCategoryModel;

  function __construct(BillCategory $billCategoryModel)
  {
    $this->billCategoryModel = $billCategoryModel;
  }

  public function all()
  {
    return $this->billCategoryModel->all();
  }
  public function latest()
  {
    return $this->billCategoryModel->latest()->get();
  }
  public function first()
  {
    return $this->billCategoryModel->first()->get();
  }
  public function store(Request $request)
  {
    $model = $this->billCategoryModel;
    $model->name = $request->get('name');
    $model->due_day = $request->get('due_day');
    $model->valid_from = $request->get('valid_from');
    $model->valid_to = $request->get('valid_to');
    $model->save();
    return $model;
  }

  public function update(Request $request)
  {
    $model = $this->billCategoryModel->findOrFail($request->id);
    $model->update($request->all());
  }
}

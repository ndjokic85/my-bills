<?php

namespace App\Repositories;

use App\Model\BillCategory;

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
  }
}

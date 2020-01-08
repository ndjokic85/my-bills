<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBillCategoryRequest;
use App\Http\Requests\UpdateBillCategoryRequest;
use App\Repositories\Front\BillCategoryRepositoryInterface;
use Illuminate\Database\QueryException;

class BillCategoryController extends Controller
{
  protected $billCategoryRepository;
  public function __construct(BillCategoryRepositoryInterface $billCategoryRepository)
  {
    $this->billCategoryRepository = $billCategoryRepository;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $billCategories = $this->billCategoryRepository->all();
    return view('categories.index', compact('billCategories'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateBillCategoryRequest $request)
  {
    try {
      $this->billCategoryRepository->store($request);
    } catch (QueryException $e) {
      return back()->withError($e->getMessage())->withInput();
    }
    return redirect('/billCategory');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateBillCategoryRequest $request, $id)
  {
    try {
      $this->billCategoryRepository->update($request);
    }

     catch (QueryException $e) {
      return back()->withError($e->getMessage())->withInput();
    }
      return redirect('/billCategory/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}

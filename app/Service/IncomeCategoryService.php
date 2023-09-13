<?php

namespace App\Service;

use App\Models\IncomeCategory;
use Yajra\DataTables\Facades\DataTables;

class IncomeCategoryService extends Service
{
  protected $model = IncomeCategory::class;

  public function forDataTable()
  {
    $income_category = $this->model::active();

    return DataTables::of($income_category)
      ->addColumn('action', fn ($item) => view('pages.income_category.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    if ($data['category_id'] != '') {
      $category = $this->model::findOrFail($data['category_id'])->fill([
        'name' => $data['name'],
        'code' => $data['code'],
      ]);
      $category->save();
    } else {
      $this->model::create($data);
    }
  }
  function delete($id)
  {
    $this->model::findOrFail($id)->delete();
  }
}

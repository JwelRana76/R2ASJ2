<?php

namespace App\Service;

use App\Models\ExpenseCategory;
use Yajra\DataTables\Facades\DataTables;

class ExpenseCategoryService extends Service
{
  protected $model = ExpenseCategory::class;

  public function forDataTable()
  {
    $expense_category = $this->model::active();

    return DataTables::of($expense_category)
      ->addColumn('action', fn ($item) => view('pages.expense_category.action', compact('item'))->render())
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

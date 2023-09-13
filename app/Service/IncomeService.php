<?php

namespace App\Service;

use App\Models\Income;
use App\Models\IncomeCategory;
use Yajra\DataTables\Facades\DataTables;

class IncomeService extends Service
{
  protected $model = Income::class;
  protected $category = IncomeCategory::class;

  public function forDataTable()
  {
    $incomes = $this->model::active();

    return DataTables::of($incomes)
      ->addColumn('action', fn ($item) => view('income.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    $this->model::create($data);
  }
  function delete($id)
  {
    $this->model::findOrFail($id)->delete();
  }

  function categorycreate($data)
  {
    $this->category::create($data);
  }
}

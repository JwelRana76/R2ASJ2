<?php

namespace App\Service;

use App\Models\Supplier;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SupplierService extends Service
{

  protected $model = Supplier::class;

  public function forDataTable()
  {
    $supplier = $this->model::active();

    return DataTables::of($supplier)
      ->addColumn('action', fn ($item) => view('pages.supplier.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      $this->model::create($data);
      DB::commit();
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
  public function update($data, $id)
  {
    $this->model::findOrFail($id)->fill([
      'name' => $data['name'],
      'mobile' => $data['mobile'],
      'organization' => $data['organization'],
      'address' => $data['address'],
    ])->save();
  }
  function delete($id)
  {
    $this->model::findOrFail($id)->fill([
      'is_active' => 0,
    ])->save();
  }
}

<?php

namespace App\Service;

use App\Models\Warehouse;
use Yajra\DataTables\Facades\DataTables;

class WarehouseService extends Service {

  protected $model = Warehouse::class;

  public function forDataTable()
    {
        $warehouses = $this->model::active();

        return DataTables::of($warehouses)
            ->addColumn('action', fn ($item) => view('warehouse.action', compact('item'))->render())
            ->make(true);
    }
  public function create($data)
  {
    if ($data['warehouse_id'] != '') {
      $warehouses = $this->model::findOrFail($data['warehouse_id'])->fill([
        'name' => $data['name'],
      ]);
      $warehouses->save();
    } else {
      $this->model::create($data);
    }
  }
  function delete($id)
  {
    $this->model::findOrFail($id)->delete();
  }

}
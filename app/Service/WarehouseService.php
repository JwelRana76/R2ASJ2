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
            ->addColumn('action', fn($item) => 0)
            ->make(true);
    }

}
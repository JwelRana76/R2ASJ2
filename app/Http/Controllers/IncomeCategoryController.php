<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Service\IncomeService;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    public function __construct()
    {
        $this->baseService = new IncomeService;
    }
    function index()
    {
        $data = IncomeCategory::get();
        return $data;
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->categorycreate($data);
        return back()->with('success', 'Income Category Created Successfully');
    }

    public function edit($id)
    {
        $data = Warehouse::find($id);
        $columns = Warehouse::$columns;
        return view('warehouse.index', compact('columns', 'data'));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('backend.warehouse.index')->with('success', 'Warehouse Deleted Successfully');
    }
}

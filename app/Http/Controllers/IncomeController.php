<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Service\IncomeService;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->baseService = new IncomeService;
    }

    public function index()
    {
        $incomes = $this->baseService->forDataTable();
        $columns = Income::$columns;

        if (request()->ajax()) {
            return $incomes;
        }

        return view('pages.income.index', compact('columns'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->create($data);
        return redirect()->route('backend.warehouse.index')->with('success', 'Warehouse Created Successfully');
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

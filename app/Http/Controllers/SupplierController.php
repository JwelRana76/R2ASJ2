<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Service\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->baseService = new SupplierService;
    }

    public function index()
    {
        $suppliers = $this->baseService->forDataTable();
        $columns = Supplier::$columns;

        if (request()->ajax()) {
            return $suppliers;
        }

        return view('pages.supplier.index', compact('columns'));
    }

    function create()
    {
        return view('pages.supplier.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->create($data);
        return redirect()->route('backend.supplier.index')->with('success', 'Supplier Created Successfully');
    }

    public function edit($id)
    {
        $data = Supplier::find($id);
        return view('pages.supplier.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->baseService->update($data, $id);
        return redirect()->route('backend.supplier.index')->with('success', 'Supplier Updated Successfully');
    }

    public function destroy($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('backend.supplier.index')->with('success', 'Supplier Deleted Successfully');
    }
}

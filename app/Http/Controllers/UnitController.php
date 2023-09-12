<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Service\ProductSettingService;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ProductSettingService;
    }
    function index()
    {
        $unit = $this->baseService->unitIndex();
        $columns = Unit::$columns;

        if (request()->ajax()) {
            return $unit;
        }

        return view('pages.unit.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->unitcreate($data);
        if ($data['unit_id']) {
            return redirect()->route('backend.unit.index')->with('success', 'Unit Updated Successfully');
        }
        return redirect()->route('backend.unit.index')->with('success', 'Unit Created Successfully');
    }

    public function edit($id)
    {
        $data = Unit::findOrFail($id);
        $columns = Unit::$columns;
        return view('pages.unit.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->unitdelete($id);
        return redirect()->route('backend.unit.index')->with('success', 'Unit Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Service\ProductSettingService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ProductSettingService;
    }
    function index()
    {
        $size = $this->baseService->sizeIndex();
        $columns = Size::$columns;

        if (request()->ajax()) {
            return $size;
        }

        return view('pages.size.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->sizecreate($data);
        if ($data['size_id']) {
            return redirect()->route('backend.size.index')->with('success', 'Size Updated Successfully');
        }
        return redirect()->route('backend.size.index')->with('success', 'Size Created Successfully');
    }

    public function edit($id)
    {
        $data = Size::findOrFail($id);
        $columns = Size::$columns;
        return view('pages.size.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->sizedelete($id);
        return redirect()->route('backend.size.index')->with('success', 'Size Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Service\ProductSettingService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ProductSettingService;
    }
    function index()
    {
        $brand = $this->baseService->brandIndex();
        $columns = Brand::$columns;

        if (request()->ajax()) {
            return $brand;
        }

        return view('pages.brand.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->brandcreate($data);
        if ($data['brand_id']) {
            return redirect()->route('backend.brand.index')->with('success', 'Brand Updated Successfully');
        }
        return redirect()->route('backend.brand.index')->with('success', 'Brand Created Successfully');
    }

    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        $columns = Brand::$columns;
        return view('pages.brand.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->branddelete($id);
        return redirect()->route('backend.brand.index')->with('success', 'Brand Deleted Successfully');
    }
}

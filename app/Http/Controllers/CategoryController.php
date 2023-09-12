<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\ProductSettingService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ProductSettingService;
    }
    function index()
    {
        $category = $this->baseService->categoryIndex();
        $columns = Category::$columns;

        if (request()->ajax()) {
            return $category;
        }

        return view('pages.category.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->categorycreate($data);
        if ($data['category_id']) {
            return redirect()->route('backend.category.index')->with('success', 'Category Updated Successfully');
        }
        return redirect()->route('backend.category.index')->with('success', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        $columns = Category::$columns;
        return view('pages.category.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->categorydelete($id);
        return redirect()->route('backend.category.index')->with('success', 'Category Deleted Successfully');
    }
}

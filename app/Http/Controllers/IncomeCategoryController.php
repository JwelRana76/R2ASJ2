<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Service\IncomeCategoryService;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    public function __construct()
    {
        $this->baseService = new IncomeCategoryService;
    }
    function index()
    {
        $category = $this->baseService->forDataTable();
        $columns = IncomeCategory::$columns;

        if (request()->ajax()) {
            return $category;
        }

        return view('pages.income_category.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->create($data);
        if ($data['category_id']) {
            return redirect()->route('backend.income.category.index')->with('success', 'Income Category Updated Successfully');
        }
        return redirect()->route('backend.income.category.index')->with('success', 'Income Category Created Successfully');
    }

    public function edit($id)
    {
        $data = IncomeCategory::find($id);
        $columns = IncomeCategory::$columns;
        return view('pages.income_category.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('backend.income.category.index')->with('success', 'Income Category Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Service\ExpenseCategoryService;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ExpenseCategoryService;
    }
    function index()
    {
        $category = $this->baseService->forDataTable();
        $columns = ExpenseCategory::$columns;

        if (request()->ajax()) {
            return $category;
        }

        return view('pages.expense_category.index', compact('columns'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $this->baseService->create($data);
        if ($data['category_id']) {
            return redirect()->route('backend.expense.category.index')->with('success', 'Expense Category Updated Successfully');
        }
        return redirect()->route('backend.expense.category.index')->with('success', 'Expense Category Created Successfully');
    }

    public function edit($id)
    {
        $data = ExpenseCategory::findOrFail($id);
        $columns = ExpenseCategory::$columns;
        return view('pages.expense_category.index', compact('columns', 'data'));
    }
    public function destroy($id)
    {
        $this->baseService->delete($id);
        return redirect()->route('backend.expense.category.index')->with('success', 'Expense Category Deleted Successfully');
    }
}

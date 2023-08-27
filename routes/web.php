<?php

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;


use App\Http\Controllers\PermissionController;




use function PHPUnit\Framework\directoryExists;
use App\Http\Controllers\Product\SaleController;
use App\Http\Controllers\Product\SizeController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\Hrm\DepartmentCotroller;
use App\Http\Controllers\Income\IncomeController;
use App\Http\Controllers\Invest\InvestController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Setting\BazarController;


//coded by rakib
use App\Http\Controllers\GeneralSettingController;

use App\Http\Controllers\Product\ReturnController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Expense\ExpenseController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Setting\UpazilaController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\PurchaseController;

use App\Http\Controllers\Product\SupplierController;
use App\Http\Controllers\Setting\DistrictController;
use App\Http\Controllers\Setting\DivisionController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Sale\DueCollectionController;
use App\Http\Controllers\Expense\ExpenseCategoryController;
use App\Http\Controllers\Income\IncomeCategoryController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\WarehouseController;

Route::get('/', function () {
    return redirect()->route('login');
});





Route::group(['as'=>'backend.','namespace'=>'Backend','middleware'=>['auth']], function() {
    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
    });



    Route::group(['as'=>'general.','prefix'=>'general'],function(){
        Route::get('/langauage/{lang}',[GeneralSettingController::class,'language'])->name('language');
    });


    Route::group(['as'=>'role.','prefix' => 'setting/role'], function() {
        Route::get('/index',[RoleController::class,'index'])->name('index');
        Route::get('/create',[RoleController::class,'create'])->name('create');
        Route::post('/store',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::get('/view/{id}',[RoleController::class,'view'])->name('view');
        Route::put('/update/{id}',[RoleController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[RoleController::class,'destroy'])->name('destroy');
        Route::get('/assign/{id}',[RoleController::class,'assign_create'])->name('assign.create');
        Route::post('/assign/{id}',[RoleController::class,'assign_store'])->name('assign.store');
    });

    Route::group(['as'=>'warehouse.','prefix' => 'setting/warehouse'], function() {
        Route::get('/',[WarehouseController::class,'index'])->name('index');
        Route::post('/store',[WarehouseController::class,'store'])->name('store');
        Route::get('/edit/{id}',[WarehouseController::class,'edit'])->name('edit');
        Route::post('/update/',[WarehouseController::class,'update'])->name('update');
        Route::get('/destroy/{id}', [WarehouseController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as'=>'category.','prefix' => 'product/setting/category'], function() {
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::post('/update/',[CategoryController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[CategoryController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'unit.','prefix' => 'product/setting/unit'], function() {
        Route::get('/',[UnitController::class,'index'])->name('index');
        Route::post('/store',[UnitController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UnitController::class,'edit'])->name('edit');
        Route::post('/update/',[UnitController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[UnitController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'size.','prefix' => 'product/setting/size'], function() {
        Route::get('/',[SizeController::class,'index'])->name('index');
        Route::post('/store',[SizeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SizeController::class,'edit'])->name('edit');
        Route::post('/update/',[SizeController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[SizeController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'brand.','prefix' => 'product/setting/brand'], function() {
        Route::get('/',[BrandController::class,'index'])->name('index');
        Route::post('/store',[BrandController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit');
        Route::post('/update/',[BrandController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[BrandController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'product.','prefix' => 'product'], function() {
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/store',[ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[ProductController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'purchase.','prefix' => 'purchase'], function() {
        Route::get('/',[PurchaseController::class,'index'])->name('index');
        Route::get('/create',[PurchaseController::class,'create'])->name('create');
        Route::post('/store',[PurchaseController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PurchaseController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[PurchaseController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[PurchaseController::class,'destroy'])->name('destroy');

        Route::get('/getcrop/{id}',[PurchaseController::class,'getcropname']);
        Route::get('/getproduct/{id}',[PurchaseController::class,'getproduct'])->name('getproduct');
        Route::post('/payment',[PurchaseController::class,'payment'])->name('payment');
    });
    Route::group(['as'=>'supplier.','prefix' => 'supplier'], function() {
        Route::get('/',[SupplierController::class,'index'])->name('index');
        Route::post('/store',[SupplierController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SupplierController::class,'edit'])->name('edit');
        Route::post('/update/',[SupplierController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[SupplierController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'sale.','prefix' => 'sale'], function() {
        Route::get('/',[SaleController::class,'index'])->name('index');
        Route::get('/create',[SaleController::class,'create'])->name('create');
        Route::post('/store',[SaleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SaleController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[SaleController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[SaleController::class,'destroy'])->name('destroy');
        Route::get('/invoice/{id}',[SaleController::class,'invoice'])->name('invoice');
        Route::get('/getsalecrop/{id}',[SaleController::class,'salecropname']);
        Route::get('/getlot/{trade}/{crop}/{type}',[SaleController::class,'getlot']);
        Route::get('/getproduct/{id}',[SaleController::class,'getproduct']);
        Route::get('/getpreviousdue/{id}',[SaleController::class,'getpreviousdue']);
    });

    Route::group(['as'=>'department.','prefix' => 'hrm/department'], function() {
        Route::get('/',[DepartmentCotroller::class,'index'])->name('index');
        Route::get('/create',[DepartmentCotroller::class,'create'])->name('create');
        Route::post('/store',[DepartmentCotroller::class,'store'])->name('store');
        Route::get('/edit/{id}',[DepartmentCotroller::class,'edit'])->name('edit');
        Route::post('/update/{id}',[DepartmentCotroller::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[DepartmentCotroller::class,'destroy'])->name('destroy');
    });



    Route::group(['as'=>'division.','prefix' => 'customer/setting/division'], function() {
        Route::get('/',[DivisionController::class,'index'])->name('index');
        Route::post('/store',[DivisionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[DivisionController::class,'edit'])->name('edit');
        Route::post('/update/',[DivisionController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[DivisionController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'district.','prefix' => 'customer/setting/district'], function() {
        Route::get('/',[DistrictController::class,'index'])->name('index');
        Route::post('/store',[DistrictController::class,'store'])->name('store');
        Route::get('/edit/{id}',[DistrictController::class,'edit'])->name('edit');
        Route::post('/update/',[DistrictController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[DistrictController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'upazila.','prefix' => 'customer/setting/upazila'], function() {
        Route::get('/',[UpazilaController::class,'index'])->name('index');
        Route::post('/store',[UpazilaController::class,'store'])->name('store');
        Route::get('/edit/{id}',[UpazilaController::class,'edit'])->name('edit');
        Route::post('/update/',[UpazilaController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[UpazilaController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'bazar.','prefix' => 'customer/setting/bazar'], function() {
        Route::get('/',[BazarController::class,'index'])->name('index');
        Route::post('/store',[BazarController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BazarController::class,'edit'])->name('edit');
        Route::post('/update/',[BazarController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[BazarController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'customer.','prefix' => 'customer'], function() {
        Route::get('/',[CustomerController::class,'index'])->name('index');
        Route::get('/create',[CustomerController::class,'create'])->name('create');
        Route::post('/store',[CustomerController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CustomerController::class,'edit'])->name('edit');
        Route::get('/view/{id}',[CustomerController::class,'view'])->name('view');
        Route::post('/update/{id}',[CustomerController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[CustomerController::class,'destroy'])->name('destroy');

        Route::get('/payment/payable/{id}',[CustomerController::class,'payable']);
        Route::get('/payment/details/{id}',[CustomerController::class,'paymentdetails']);
        Route::post('/payment',[CustomerController::class,'payment'])->name('payment');
        Route::get('/payment/edit/{id}',[CustomerController::class,'payment_edit'])->name('payment.edit');
        Route::post('/payment/update',[CustomerController::class,'payment_update'])->name('payment.update');
        Route::delete('/payment/delete/{id}',[CustomerController::class,'payment_delete'])->name('payment.delete');
    });

    Route::group(['as'=>'return.','prefix' => 'return'], function() {
        Route::get('/sale',[ReturnController::class,'sale_index'])->name('sale.index');
        Route::post('/sale/store',[ReturnController::class,'sale_store'])->name('sale.store');
        Route::delete('/sale/destroy/{id}',[ReturnController::class,'sale_destroy'])->name('sale.destroy');
    
        Route::get('/purchase',[ReturnController::class,'purchase_index'])->name('purchase.index');
        Route::post('/purchase/store',[ReturnController::class,'purchase_store'])->name('purchase.store');
        Route::delete('/purchase/destroy/{id}',[ReturnController::class,'purchase_destroy'])->name('purchase.destroy');
    });

    Route::group(['as'=>'due.','prefix' => 'due'], function() {
        Route::get('/payment',[DueCollectionController::class,'index'])->name('payment.index');
        Route::post('/collect',[DueCollectionController::class,'collect'])->name('collect');
    });

    Route::group(['as'=>'account.','prefix' => 'account'], function() {
        Route::get('/',[AccountController::class,'index'])->name('index');
        Route::post('/store',[AccountController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AccountController::class,'edit'])->name('edit');
        Route::post('/update/',[AccountController::class,'update'])->name('update');

        Route::get('/cashbook',[AccountController::class,'cashbook'])->name('cashbook');
    });

    Route::group(['as'=>'invest.','prefix' => 'invest'], function() {
        Route::get('/',[InvestController::class,'index'])->name('index');
        Route::post('/store',[InvestController::class,'store'])->name('store');
        Route::get('/edit/{id}',[InvestController::class,'edit'])->name('edit');
        Route::post('/update/',[InvestController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[InvestController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'expense.','prefix' => 'expense'], function() {
        Route::get('/',[ExpenseController::class,'index'])->name('index');
        Route::post('/store',[ExpenseController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ExpenseController::class,'edit'])->name('edit');
        Route::post('/update/',[ExpenseController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[ExpenseController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'expense_category.','prefix' => 'expense/category'], function() {
        Route::get('/',[ExpenseCategoryController::class,'index'])->name('index');
        Route::post('/store',[ExpenseCategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ExpenseCategoryController::class,'edit'])->name('edit');
        Route::post('/update/',[ExpenseCategoryController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[ExpenseCategoryController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'income.','prefix' => 'income'], function() {
        Route::get('/',[IncomeController::class,'index'])->name('index');
        Route::post('/store',[IncomeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[IncomeController::class,'edit'])->name('edit');
        Route::post('/update/',[IncomeController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[IncomeController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'income_category.','prefix' => 'income/category'], function() {
        Route::get('/',[IncomeCategoryController::class,'index'])->name('index');
        Route::post('/store',[IncomeCategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[IncomeCategoryController::class,'edit'])->name('edit');
        Route::post('/update/',[IncomeCategoryController::class,'update'])->name('update');
        Route::delete('/destroy/{id}',[IncomeCategoryController::class,'destroy'])->name('destroy');
    });

    // report route section 
    Route::group(['as'=>'report.','prefix' => 'report'], function() {
        Route::get('/product_report',[ReportController::class,'product_report'])->name('product_report');
        Route::get('/sale_report',[ReportController::class,'sale_reprot'])->name('sale_reprot');
        Route::get('/purchase_report/{year}/{month}',[ReportController::class,'purchase_report'])->name('purchase_report');
        Route::get('/profit_report',[ReportController::class,'profit_report'])->name('profit_report');
        Route::get('/supplier_report',[ReportController::class,'supplier_report'])->name('supplier_report');
        Route::get('/customer_ledger',[ReportController::class,'customer_ledger'])->name('customer_ledger');
    });

});




require __DIR__.'/auth.php';


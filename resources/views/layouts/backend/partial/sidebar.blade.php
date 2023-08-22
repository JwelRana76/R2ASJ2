
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="">
    <div class="sidebar-brand-icon">
      <img src="img/logo/logo2.png">
    </div>
    <div class="sidebar-brand-text mx-3"><span class="small">PMS</span></div>
  </a>

  <hr class="sidebar-divider my-0">

  <li class="nav-item {{Route::currentRouteName() == 'backend.dashboard' ? 'active' : 0}}">
    <a class="nav-link" href="{{ route('backend.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>{{ __('sidebar.dashboard') }}</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">

  </div>

  @if (userHasPermission('product-module'))
  <li class="nav-item">
      <a class="nav-link {{Request::is('product/*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#academic-menu" aria-expanded="true"
        aria-controls="academic-menu" id="submenu">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>{{ __('sidebar.product') }}</span>
      </a>
      <div id="academic-menu" class="collapse {{Request::is('product/*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          @if(userHasPermission('product-index'))
          <a class="collapse-item {{Request::is('product/create')?'active':''}}" href="{{ route('backend.product.create') }}">{{ __('sidebar.add-product') }}</a>
          @endif
          @if(userHasPermission('product-store'))
          <a class="collapse-item {{Request::is('product')?'active':''}}" href="{{ route('backend.product.index') }}">{{ __('sidebar.product-list') }}</a>
          @endif
          @if (userHasPermission('product_setting-module'))
          <a class="nav-link collapse-item {{Request::is('product/setting*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#product_setting" aria-expanded="true"
            aria-controls="product_setting" style="width: 176px">
            <span>{{ __('sidebar.setting') }}</span>
          </a>
          <div id="product_setting" class="collapse {{Request::is('product/setting*')?'show':''}}" aria-labelledby="headingForm" data-parent="#submenu">
            <div class="bg-white py-2 collapse-inner rounded">

              @if(userHasPermission('product_setting-index'))
              <a class="collapse-item {{Request::is('product/setting/category')?'active':''}}" href="{{ route('backend.category.index') }}">{{ __('sidebar.category') }}</a>
              <a class="collapse-item {{Request::is('product/setting/unit')?'active':''}}" href="{{ route('backend.unit.index') }}">{{ __('sidebar.unit') }}</a>
              <a class="collapse-item {{Request::is('product/setting/size')?'active':''}}" href="{{ route('backend.size.index') }}">{{ __('sidebar.size') }}</a>
              <a class="collapse-item {{Request::is('product/setting/brand')?'active':''}}" href="{{ route('backend.brand.index') }}">{{ __('sidebar.brand') }}</a>
              @endif

            </div>
          </div>
          @endif
        </div>
      </div>
  </li>
  @endif
  @if (userHasPermission('purchase-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('purchase*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#purchase-menu" aria-expanded="true"
      aria-controls="purchase-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.purchase') }}</span>
    </a>
    <div id="purchase-menu" class="collapse {{Request::is('purchase*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('purchase-store'))
        <a class="collapse-item {{Request::is('purchase/create')?'active':''}}" href="{{ route('backend.purchase.create') }}">{{ __('sidebar.add-purchase') }}</a>
        @endif
        @if (userHasPermission('purchase-index'))
        <a class="collapse-item {{Request::is('purchase/')?'active':''}}" href="{{ route('backend.purchase.index') }}">{{ __('sidebar.purchase-list') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('sale-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('sale*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#sale-menu" aria-expanded="true"
      aria-controls="sale-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.sale') }}</span>
    </a>
    <div id="sale-menu" class="collapse {{Request::is('sale*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('sale-store'))
        <a class="collapse-item {{Request::is('sale/create')?'active':''}}" href="{{ route('backend.sale.create') }}">{{ __('sidebar.add-sale') }}</a>
        @endif
        @if (userHasPermission('sale-index'))
        <a class="collapse-item {{Request::is('sale/')?'active':''}}" href="{{ route('backend.sale.index') }} ">{{ __('sidebar.sale-list')  }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  
  {{-- @if (userHasPermission('sale-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('due*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#due-collection-menu" aria-expanded="true"
      aria-controls="due-collection-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.due-collection') }}</span>
    </a>
    <div id="due-collection-menu" class="collapse {{Request::is('due*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('sale-store'))
        <a class="collapse-item {{Request::is('due/payment')?'active':''}}" href="">{{ __('sidebar.due-payment') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif --}}

  @if (userHasPermission('return-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('return*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#return-menu" aria-expanded="true"
      aria-controls="return-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.return') }}</span>
    </a>
    <div id="return-menu" class="collapse {{Request::is('return*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('return-index'))
        <a class="collapse-item {{Request::is('sale')?'active':''}}" href="{{ route('backend.return.sale.index') }}">{{ __('sidebar.sale') }}</a>
        <a class="collapse-item {{Request::is('purchase')?'active':''}}" href="{{ route('backend.return.purchase.index') }}">{{ __('sidebar.purchase') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('accounting-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('account*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#account-menu" aria-expanded="true"
      aria-controls="account-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.accounting') }}</span>
    </a>
    <div id="account-menu" class="collapse {{Request::is('account*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('accounting-index'))
        <a class="collapse-item {{Request::is('account')?'active':''}}" href="{{ route('backend.account.index') }}">{{ __('sidebar.account-list') }}</a>
        @endif
        @if (userHasPermission('accounting-index'))
        <a class="collapse-item {{Request::is('account')?'active':''}}" href="{{ route('backend.account.cashbook') }}">{{ __('sidebar.cashbook') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('expense-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('expense*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#expense-menu" aria-expanded="true"
      aria-controls="expense-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.expense') }}</span>
    </a>
    <div id="expense-menu" class="collapse {{Request::is('expense*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('expense-index'))
        <a class="collapse-item {{Request::is('expense')?'active':''}}" href="{{ route('backend.expense.index') }}">{{ __('sidebar.expense-list') }}</a>
        @endif
        @if (userHasPermission('expense-advance'))
        <a class="collapse-item {{Request::is('expense/category')?'active':''}}" href="{{ route('backend.expense_category.index') }}">{{ __('sidebar.expense-category') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('invest-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('invest*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#invest-menu" aria-expanded="true"
      aria-controls="invest-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.invest') }}</span>
    </a>
    <div id="invest-menu" class="collapse {{Request::is('invest*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('expense-index'))
        <a class="collapse-item {{Request::is('invest')?'active':''}}" href="{{ route('backend.invest.index') }}">{{ __('sidebar.invest-list') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('income-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('income*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#income-menu" aria-expanded="true"
      aria-controls="income-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.income') }}</span>
    </a>
    <div id="income-menu" class="collapse {{Request::is('income*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('income-index'))
        <a class="collapse-item {{Request::is('income/category')?'active':''}}" href="{{ route('backend.income_category.index') }}">{{ __('sidebar.income-category') }}</a>
        @endif
        @if (userHasPermission('income-index'))
        <a class="collapse-item {{Request::is('income')?'active':''}}" href="{{ route('backend.income.index') }}">{{ __('sidebar.income-list') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (userHasPermission('supplier-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('supplier*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#supplier-menu" aria-expanded="true"
      aria-controls="supplier-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.supplier') }}</span>
    </a>
    <div id="supplier-menu" class="collapse {{Request::is('supplier*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('supplier-index'))
        <a class="collapse-item {{Request::is('supplier')?'active':''}}" href="{{ route('backend.supplier.index') }}">{{ __('sidebar.supplier-list') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif

  @if (userHasPermission('customer-module'))
  <li class="nav-item">
      <a class="nav-link {{Request::is('customer*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#customer-menu" aria-expanded="true"
        aria-controls="customer-menu" id="submenu">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>Customer</span>
      </a>
      <div id="customer-menu" class="collapse {{Request::is('customer*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          @if(userHasPermission('customer-store'))
          <a class="collapse-item {{Request::is('customer/create')?'active':''}}" href="{{ route('backend.customer.create') }}">Add customer</a>
          @endif
          @if(userHasPermission('customer-index'))
          <a class="collapse-item {{Request::is('customer')?'active':''}}" href="{{ route('backend.customer.index') }}">Customer List</a>
          @endif
          @if (userHasPermission('customer_settin-module'))
          <a class="nav-link collapse-item {{Request::is('customer/setting*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#customer_setting" aria-expanded="true"
            aria-controls="customer_setting" style="width: 176px">
            <span>{{ __('sidebar.setting') }}</span>
          </a>
          <div id="customer_setting" class="collapse {{Request::is('customer/setting*')?'show':''}}" aria-labelledby="headingForm" data-parent="#submenu">
            <div class="bg-white py-2 collapse-inner rounded">

              @if(userHasPermission('customer_setting-index'))
                  <a class="collapse-item {{Request::is('customer/setting/division')?'active':''}}" href="{{ route('backend.division.index') }}">{{ __('sidebar.division') }}</a>
                  <a class="collapse-item {{Request::is('customer/setting/district')?'active':''}}" href="{{ route('backend.district.index') }}">{{ __('sidebar.district') }}</a>
                  <a class="collapse-item {{Request::is('customer/setting/upazila')?'active':''}}" href="{{ route('backend.upazila.index') }}">{{ __('sidebar.upazila') }}</a>
                  <a class="collapse-item {{Request::is('customer/setting/bazar')?'active':''}}" href="{{ route('backend.bazar.index') }}">{{ __('sidebar.bazar') }}</a>
              @endif

            </div>
          </div>
          @endif
        </div>
      </div>

  </li>
  @endif
  @if (userHasPermission('report-module'))
  <li class="nav-item">
    <a class="nav-link {{Request::is('report*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#report-menu" aria-expanded="true"
      aria-controls="report-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.report') }}</span>
    </a>
    <div id="report-menu" class="collapse {{Request::is('report*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        @if (userHasPermission('report-index'))
        <a class="collapse-item {{Request::is('report/product_report')?'active':''}}" href="{{ route('backend.report.product_report') }}">{{ __('sidebar.product-report') }}</a>
        <a class="collapse-item {{Request::is('report/sale_report*')?'active':''}}" href="{{ route('backend.report.sale_reprot') }}">{{ __('sidebar.sale-report') }}</a>
        <a class="collapse-item {{Request::is('report/purchase_report*')?'active':''}}" href="{{url('report/purchase_report/'.date('Y').'/'.date('m'))}}">{{ __('sidebar.purchase-report') }}</a>
        <a class="collapse-item {{Request::is('report')?'active':''}}" href="{{ route('backend.report.profit_report') }}">{{ __('sidebar.profit-report') }}</a>
        {{-- <a class="collapse-item {{Request::is('report')?'active':''}}" href="{{ route('backend.report.supplier_report') }}">{{ __('sidebar.supplier-report') }}</a> --}}
        
        @endif
        @if (userHasPermission('customer_ledger-index'))
        <a class="collapse-item {{Request::is('report/customer_ledger*')?'active':''}}" href="{{ route('backend.report.customer_ledger') }}">{{ __('sidebar.customer-ledger') }}</a>
        @endif
      </div>
    </div>
  </li>
  @endif
  @if (Auth::user()->id == 1)
  <li class="nav-item">
    <a class="nav-link {{Request::is('setting*')?'':'collapsed'}}" active href="#" data-toggle="collapse" data-target="#setting-menu" aria-expanded="true"
      aria-controls="setting-menu">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>{{ __('sidebar.setting') }}</span>
    </a>
    <div id="setting-menu" class="collapse {{Request::is('setting*')?'show':''}}" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{Request::is('setting/warehouse')?'active':''}}" href="{{ route('backend.warehouse.index') }}">Warehouse</a>
        <a class="collapse-item {{Request::is('setting/role/create')?'active':''}}" href="{{ route('backend.role.create') }}">{{ __('sidebar.role-permission') }}</a>
      </div>
    </div>
  </li>
  @endif
</ul>

<x-admin title="Warehouse">

  <x-page-header>
      <h4>Bank</h4>
      <a href="#" class="btn btn-primary">Add Bank</a>
  </x-page-header>

  <x-data-table dataUrl="/setting/warehouse" id="warehouse" :columns="$columns" />

</x-admin>
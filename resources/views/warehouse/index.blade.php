<x-admin title="Warehouse">

  <x-page-header>
      <h4>Warehouse</h4>
      <a href="#" class="btn btn-sm btn-primary">Add Warehouse</a>
  </x-page-header>

  <x-data-table dataUrl="/setting/warehouse" id="warehouse" :columns="$columns" />

</x-admin>
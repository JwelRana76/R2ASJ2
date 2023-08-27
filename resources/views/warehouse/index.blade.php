<x-admin title="Warehouse">

  <x-page-header>
      <h4>Warehouse</h4>
  </x-page-header>

  <div class="row">
    <div class="col-md-8 col-sm-12">
      <x-data-table dataUrl="/setting/warehouse" id="warehouse" :columns="$columns" />
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New Warehouse</h4>
        </div>
        <div class="card-body">
          <x-form action="{{ route('backend.warehouse.store') }}" method="POST">
            <input name="warehouse_id" value="{{ $data['id'] ?? '' }}" type="hidden">
            <x-input-text id="name" value="{{ $data['name'] ?? '' }}" />
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
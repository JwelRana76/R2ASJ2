<x-admin title="Supplier">

  <x-page-header>
      <h4>Supplier</h4>
      <div class="right">
        <a href="{{ route('backend.supplier.create') }}" class="btn btn-sm btn-success">Add Supplier</a>
      </div>
  </x-page-header>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <x-data-table dataUrl="/supplier" id="supplier" :columns="$columns" />
    </div>
    
  </div>
  @push('js')
      <script>
        
      </script>
  @endpush
</x-admin>
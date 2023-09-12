<x-admin title="Income">

  <x-page-header>
      <h4>Income</h4>
      <div class="right">
        <a href="#" class="btn btn-sm btn-success">Add Income</a>
      </div>
  </x-page-header>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <x-data-table dataUrl="/income" id="income" :columns="$columns" />
    </div>
    
  </div>
  @push('js')
      <script>
        
      </script>
  @endpush
</x-admin>
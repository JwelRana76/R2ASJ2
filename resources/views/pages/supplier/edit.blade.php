<x-admin title="Supplier Edit">

  <x-page-header>
      <h4>Supplier Edit</h4>
      <div class="right">
        <a href="{{ route('backend.supplier.index') }}" class="btn btn-sm btn-success">Supplier List</a>
      </div>
  </x-page-header>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <x-form action="{{ route('backend.supplier.update',$data->id) }}" method="POST">
            <div class="row">
              <div class="col-md-4">
                <x-input-text id="name" value="{{ $data->name }}" />
              </div>
              <div class="col-md-4">
                <x-input-text id="mobile" value="{{ $data->mobile }}" />
              </div>
              <div class="col-md-4">
                <x-input-text id="organization" value="{{ $data->organization }}" />
              </div>
              <div class="col-md-4">
                <x-input-text id="address" value="{{ $data->address }}" />
              </div>
            </div>
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
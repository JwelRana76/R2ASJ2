<x-admin title="Supplier Create">

  <x-page-header>
      <h4>Supplier Create</h4>
      <div class="right">
        <a href="{{ route('backend.supplier.index') }}" class="btn btn-sm btn-success">Supplier List</a>
      </div>
  </x-page-header>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <x-form action="{{ route('backend.supplier.store') }}" method="POST">
            <div class="row">
              <div class="col-md-4">
                <x-input-text id="name" />
              </div>
              <div class="col-md-4">
                <x-input-text id="mobile" />
              </div>
              <div class="col-md-4">
                <x-input-text id="organization" />
              </div>
              <div class="col-md-4">
                <x-input-text id="address" />
              </div>
            </div>
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
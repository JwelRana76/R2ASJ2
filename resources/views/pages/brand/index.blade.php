<x-admin title="Brand">

  <x-page-header>
      <h4>Brand</h4>
  </x-page-header>

  <div class="row">
    <div class="col-md-8 col-sm-12">
      <x-data-table dataUrl="/product/setting/brand" id="Brand" :columns="$columns" />
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New Brand</h4>
        </div>
        <div class="card-body">
          <x-form action="{{ route('backend.brand.store') }}" method="POST">
            <input name="brand_id" value="{{ $data['id'] ?? '' }}" type="hidden">
            <x-input-text id="name" value="{{ $data['name'] ?? '' }}" />
            <x-input-text id="code" value="{{ $data['code'] ?? '' }}" />
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
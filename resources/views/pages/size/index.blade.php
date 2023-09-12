<x-admin title="Size">

  <x-page-header>
      <h4>Size</h4>
  </x-page-header>

  <div class="row">
    <div class="col-md-8 col-sm-12">
      <x-data-table dataUrl="/product/setting/size" id="Size" :columns="$columns" />
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New Size</h4>
        </div>
        <div class="card-body">
          <x-form action="{{ route('backend.size.store') }}" method="POST">
            <input name="size_id" value="{{ $data['id'] ?? '' }}" type="hidden">
            <x-input-text id="name" value="{{ $data['name'] ?? '' }}" />
            <x-input-text id="code" value="{{ $data['code'] ?? '' }}" />
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
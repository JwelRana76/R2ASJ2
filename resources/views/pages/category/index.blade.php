<x-admin title="Category">

  <x-page-header>
      <h4>Category</h4>
  </x-page-header>

  <div class="row">
    <div class="col-md-8 col-sm-12">
      <x-data-table dataUrl="/product/setting/category" id="Category" :columns="$columns" />
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Add New Category</h4>
        </div>
        <div class="card-body">
          <x-form action="{{ route('backend.category.store') }}" method="POST">
            <input name="category_id" value="{{ $data['id'] ?? '' }}" type="hidden">
            <x-input-text id="name" value="{{ $data['name'] ?? '' }}" />
            <x-input-text id="code" value="{{ $data['code'] ?? '' }}" />
            <x-submit>Submit</x-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>

</x-admin>
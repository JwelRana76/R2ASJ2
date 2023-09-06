<x-admin title="Income">

  <x-page-header>
      <h4>Income</h4>
      <div class="right">
        <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#income_category_create">Add Category</a>
        <a href="#" onclick="incomeCategoryList()" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#income_category_list">Category List</a>
        <a href="#" class="btn btn-sm btn-success">Add Income</a>
      </div>
  </x-page-header>

  <div class="row">
    <div class="col-md-12 col-sm-12">
      <x-data-table dataUrl="/income" id="income" :columns="$columns" />
    </div>
    
  </div>
  <x-modal id="income_category_create">
    <x-form action="{{ route('backend.income_category.store') }}" method="POST">
      <x-input-text id="name" />
      <x-input-text id="code" />
    <x-submit>Submit</x-submit>
    </x-form>
  </x-modal>
  <x-modal id="income_category_edit">
    <x-form action="{{ route('backend.income_category.update',1) }}" method="POST">
      <x-input-text id="name" />
      <x-input-text id="code" />
    <x-submit>Submit</x-submit>
    </x-form>
  </x-modal>
  <x-modal id="income_category_list">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="categorylisttable"></tbody>
      </table>
  </x-modal>
  @push('js')
      <script>
        function incomeCategoryList() {
         $.get("/income/category",
          function (data) {
            $('#categorylisttable').html(null); 
           $.each(data, function (i, v) { 
              var id = v.id;
             $('#categorylisttable').append(`
              <tr>
                <td>${i+1}</td>
                <td>${v.name}</td>
                <td>${v.code}</td>
                <td>
                  <div class="btn-group dropleft">
                    <button type="button" class="action-button dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="incomeCategoryEdit(${v.id})" class="btn btn-sm btn-primary"><i class="fa-regular text-primary fa-pen-to-square"></i> Edit</a>
                        <a class="dropdown-item" href="/income/category.destroy/${id}" onclick="return confirm('Are you sure to Delete this record..??')"><i class="fa-regular text-danger fa-trash-can"></i> Delete</a>
                    </div>  
                  </div>
                </td>
              </tr>
             `);
           });
          }
         ); 
        }
        function incomeCategoryEdit(Id){
          $('#income_category_list').hide();
        }
      </script>
  @endpush
</x-admin>
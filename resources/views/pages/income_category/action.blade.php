<!-- Default dropleft button -->
<div class="btn-group dropleft">
    <button type="button" class="action-button dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('backend.income.category.edit',$item->id) }}"><i class="fa-regular text-primary fa-pen-to-square"></i> Edit</a>
        <a class="dropdown-item" href="{{ route('backend.income.category.destroy',$item->id) }}" onclick="return confirm('Are you sure to Delete this record..??')"><i class="fa-regular text-danger fa-trash-can"></i> Delete</a>
    </div>  
</div>

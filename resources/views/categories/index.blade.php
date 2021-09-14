@extends('layouts.frontend.base')

@section('content')

<div class="d-flex justify-content-end mb-2">

<a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>

</div>

<div class="card card-default">

    <div class="card-header">Categories</div>


    <div class="card-body">


     @if ($categories->count() > 0)

     <table class="table">

      <thead>

          <th>Name</th>

          <th>Post Count</th>

          <th></th>

      </thead>

      <tbody>

          @foreach ($categories as $category)

          <tr>

              <td>

                  {{$category->name}}

              </td>

              <td>

                {{$category->posts->count()}}

              </td>

              <td>

                  <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">
                  
                    Edit

                  </a>

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal">
                     Delete
                      </button>




              </td>

          </tr>
              
          @endforeach

      </tbody>

  </table>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
<form action="" method="POST" id="deleteCategoryForm">

  @csrf

  @method('DELETE')

  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this category ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> No, Go Back</button>
        <button type="submit" class="btn btn-danger btn-sm">Yes, Delete</button>
      </div>
    </div>

</form>
</div>
</div>


</div>

</div>

         
     @else
     
     <h3 class="text-center">No Categories Yet</h3>
    
     @endif

    
@endsection

@section('scripts')
    
<script>

function handleDelete(id) {

    var form = document.getElementById('deleteCategoryForm')

    form.action = '/categories/' + id

   

}

</script>

@endsection
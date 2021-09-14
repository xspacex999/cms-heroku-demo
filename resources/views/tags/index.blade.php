@extends('layouts.frontend.base')

@section('content')

<div class="d-flex justify-content-end mb-2">

<a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>

</div>

<div class="card card-default">

    <div class="card-header">Tags</div>


    <div class="card-body">


     @if ($tags->count() > 0)

     <table class="table">

      <thead>

          <th>Name</th>

          <th>Post Count</th>

          <th></th>

      </thead>

      <tbody>

          @foreach ($tags as $tag)

          <tr>

              <td>

                  {{$tag->name}}

              </td>

              <td>

                {{$tag->posts->count()}}

              </td>

              <td>

                  <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm">
                  
                    Edit

                  </a>

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
<form action="" method="POST" id="deleteTagForm">

  @csrf

  @method('DELETE')

  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
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
     
     <h3 class="text-center">No Tags Yet</h3>
    
     @endif

    
@endsection

@section('scripts')
    
<script>

function handleDelete(id) {

    var form = document.getElementById('deleteTagForm')

    form.action = '/tags/' + id

   

}

</script>

@endsection
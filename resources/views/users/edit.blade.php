@extends('layouts.frontend.base')
        

@section('content')
    
<div class="card card_default">

    <div class="card-header">
        My Profile
    </div>

    @include('layouts.frontend.partials.error')
    <div class="card-body">

        <form action="{{route('users.update-profile')}}" method="POST">
        
            @csrf

            @method('put')

            <div class="form-group">

                <label for="name">Name</label>

                <input type="text" name="name" id="name" value="{{$user->name}}"  class="form-control">

            </div>

            <div class="form-group">

                <label for="about">About Me</label>

                <textarea name="about" id="about" cols="5" rows="5" class="form-control">

                    {{$user->about}}

                </textarea>

            </div>

            <button type="submit" class="btn btn-success mt-2">Update Profile </button>

        </form>

    </div>

</div>



@endsection

        
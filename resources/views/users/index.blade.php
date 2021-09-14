@extends('layouts.frontend.base')

@section('content')



    <div class="card card_default">

        <div class="card-header">
            users
        </div>

        <div class="card-body">

           @if ($users->count() > 0)
           
           <table class="table">

            <thead>

                <th>Image</th>

                <th>Name</th>

                <th>Email</th>

                <th></th>

                <th></th>

            </thead>

            <tbody>

                @foreach ($users as $user)

                <tr>
                  
                    <td>
                   
                        <img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($user->email) }}">

                    <td>

                        {{$user->name}}

                    </td>

                    <td>

                       {{$user->email}}

                    </td>

        
                    <td>
 

                        @if (!$user->isAdmin())
                            

                       <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                    

                        @csrf

                        <button class="btn btn-success btn-sm" type="submit">Make Admin</button>
                    

                    </form>

                        @endif

                    </td>

                </tr>
                    
                @endforeach

            </tbody>

        </table>

           @else
           
           <h3 class="text-center">No Users Yet</h3>

           @endif

        </div>

    </div>

@endsection
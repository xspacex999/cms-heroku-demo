<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

    <div class="container-fluid">

      <a class="navbar-brand" href="/">MyTrip</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       
        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

         
         
          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
                Dropdown

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="#">Action</a></li>

              <li><a class="dropdown-item" href="#">Another action</a></li>

              <li><hr class="dropdown-divider"></li>

              <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
                Dropdown

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="#">Action</a></li>

              <li><a class="dropdown-item" href="#">Another action</a></li>

              <li><hr class="dropdown-divider"></li>

              <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
                Dropdown

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="#">Action</a></li>

              <li><a class="dropdown-item" href="#">Another action</a></li>

              <li><hr class="dropdown-divider"></li>

              <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            
                Dropdown

            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="#">Action</a></li>

              <li><a class="dropdown-item" href="#">Another action</a></li>

              <li><hr class="dropdown-divider"></li>

              <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           
             {{--    @foreach ( $users as $user)
                
                {{$user->name}}

              @endforeach

               --}}
               Profile
            
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              

              @auth

              <li>

                  <a href="{{ url('/dashboard') }}" class="dropdown-item">Dashboard</a>

              </li>

              <li>
    
                <a class="dropdown-item" href="{{route('users.edit-profile')}}">User Profile</a>
            </li>

              <li>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a   onclick="event.preventDefault();
                this.closest('form').submit();" href="{{ route('logout') }}" class="dropdown-item">Logout</a>

            </form>

              </li>

              @else

              <li>

                  <a href="{{ route('login') }}" class="dropdown-item">Log in</a>

              </li>

              <li>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                  @endif

              </li>

              @endauth

            </ul>

          </li>

        
         
        

         
        </ul>
       
      </div>

    </div>

  </nav>

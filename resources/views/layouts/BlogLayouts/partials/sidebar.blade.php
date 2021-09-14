  <!--search button  -->

  <nav class="navbar navbar-light bg-light">


    <div class="container-fluid">

      <form class="d-flex" action="{{route('home')}}" method="GET">

        <input class="form-control me-2" name="search" type="text" placeholder="Search" >

    

      </form>

    </div>

  </nav>


    <!-- category link in side bar -->

      <div class="container">

        <p class="lead text-uppercase">
            Categories
          </p>

        <div class="row row-cols row-cols-lg-2 g-2 g-lg-3">

            @foreach ($categories as $category)

                <div class="col">

                    <div class="p-3 border bg-success p-2 text-dark bg-opacity-25"> 
                        
                        <a href="{{route('blog.category', $category->id)}}" class="text-white">

                        {{$category->name}}
    
                         </a>
                
                </div>

                </div>
               
            @endforeach

        </div>

       </div>




        <!-- tag link in side bar -->

      <div class="container mt-4">

        <p class="lead text-uppercase">
           Tags
          </p>

        <div class="row row-cols row-cols-lg-2 g-2 g-lg-3">

            @foreach ($tags as $tag)

                <div class="col">

                    <div class="p-3 border bg-success p-2 text-dark bg-opacity-25"> 
                        
                        <a href="{{route('blog.tag', $tag->id)}}" class="text-white">

                        {{$tag->name}}
    
                         </a>
                
                </div>

                </div>
               
            @endforeach

        </div>

       </div>


@extends('layouts.BlogLayouts.blog')

   @section('stylesheet')


   @endsection

   @section('title')
   
   My Trip

   @endsection



      <!-- banner  -->

      @include('layouts.BlogLayouts.partials.banner')


      @section('content')

      <!--post section -->

    
      <div class="posts-container">
        <div class="posts-page-left">
         <div class="post-section-row">
           
          @forelse ($posts as $post)
    
            <div class="post-section-cols border border-white rounded">
    
                <div class="post-section-card">
    
                  <a href="{{route('blog.show', $post->id)}}">

                    <img src="{{asset('images/posts/' .$post->image)}}" class="post-section-card-img rounded-top" alt="...">

                  </a>
    
                    <div class="post-section-card-body">
    
                      <h5 class="font-sans md:font-serif text-xl antialiased font-medium tracking-wide text-center text-black">
    
                        {{$post->category->name}}
    
                      </h5>
    
                      <p class="font-sans md:font-serif text-base antialiased font-medium tracking-wide text-current">
                        
                        <a class="btn btn-light" href="{{route('blog.show', $post->id)}}">

                    {{$post->title}}

                        </a>
                        
                    </p>
                    </div>
                  </div>
             </div>

             @empty

             <p class="text-center">

              No result found for query <strong>{{request()->query('search')}} </strong>

             </p>
               
            
                
            @endforelse
        
  
        
         </div>
        {{$posts->appends(['search' => request()->query('search') ])->links()}}
        </div>


        <div class="posts-page-right">

          @include('layouts.BlogLayouts.partials.sidebar')

        
    
        </div>
        </div>
          

@endsection

    
      













   
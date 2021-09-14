@extends('layouts.BlogLayouts.blog')
<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "|  $titleTag")



@section('content')


<div class="single-post-row h-24 bg-indigo-900" style="margin-top: 100px">

    
    <div class="single-post-col mt-8 ml-44">

      <p class="text-gray-200 font-mono">
          
        <span class="text-2xl font-medium text-white">FREE MOM HACKS BOOK: </span>
        
        A WEEK OF MEALS, ACTIVITIES & TIPS PLANNED FOR YOU!
    
    </p>

    </div>

    <div class=" mt-8 ml-20">

        <button class="bg-blue-400 hover:bg-red-700 w-44 h-10 text-white">Button</button>

    </div>

  </div> 

  <!-- post content -->

<div class="single-post-body-row">

<div class="left-single-post-body-col">

    <!--posts link by breadcrumb  -->

  <div class="m-4">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="#">Home</a></li>

          <li class="breadcrumb-item"><a href="#">Library</a></li>

          <li class="breadcrumb-item active" aria-current="page">Data</li>

        </ol>

      </nav>

  </div>

  <!--post title  -->

  <p class="h1 m-4">
      
    {{$post->title}}

   </p>

  <p class="m-4">
      
    <span>BY  {{$post->user->name}} </span>

   <span class="d-flex justify-content-between">
       
    <img width="40px"  style="border-radius: 50%; height: 53px;" src="{{ Gravatar::src($post->user->email) }}"> 
    

   </span>
    
   </p>

<p>
    <span> PUBLISHED: {{date('M j, Y h:ia', strtotime($post->created_at))}}</span>
    
    <span> LAST UPDATED: {{date('M j, Y h:ia', strtotime($post->updated_at))}}</span>
     
</p>


                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
  <div class="socail-media-blog-posts-icon bg-blue-700">
    <div class="box-border h-12 w-28 p-2 border-4 ...">1 </div>
    <div class="box-border h-12 w-28 p-2 border-4 ...">1 </div>
    <div class="box-border h-12 w-28 p-2 border-4 ...">1 </div>
    <div class="box-border h-12 w-28 p-2 border-4 ...">1 </div>
  </div>
  <div class="single-img">
    <img src="{{asset('images/posts/' .$post->image)}}" class="single-img-body" alt="this a photo" />
  </div>
  <div class="tags">
    @foreach ($post->tags as $tag)
    <span class="label label-default">

      <a href="{{route('blog.tag', $tag->id)}}" class="btn btn-light">
      
        {{$tag->name}}
      
      </a>
      
    </span>


    @endforeach
</div>
  <div class="body m-4">
<p>{!! $post->content !!}</p>
  </div>



<hr>
  <!--disqus page  -->


  <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = "{{config('app.url')}}/blog/posts/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = "{{ $post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://mytrip-2.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


</div>


<div class="right-single-post-body-col">


  <div class="card right-card-single">


    <img src="{{asset('images/hello.jpg')}}" class="card-img-top" alt="...">

    <div class="card-body">

      <h5 class="card-title">Card title</h5>

      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

      <a href="#" class="btn btn-primary">Go somewhere</a>

    </div>

  </div>

</div>

</div>

  
   
@endsection
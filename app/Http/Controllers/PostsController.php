<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Posts\CreatePostsRequest;

use App\Http\Requests\Posts\UpdatePostsRequest;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use JD\Cloudder\Facades\Cloudder;




class PostsController extends Controller
{


    public function __construct() {

        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {


        $post = new Post;

        $post->title      = $request->title;
        $post->description       = $request->description;
        $post->content       = $request->content;
        $post->category_id      = $request->category;
        $post->published_at      = $request->published_at;
        $post->user_id    = auth()->user()->id;


       

        
      //   Auth::id();
   

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $post->image_path = $logoUrl;
            $post->public_id  = $publicId;
        }

        $post->save();


        //upload the image to storage

       // $imageName = time().'.'.$request->image->extension();
        //$request->image->move(public_path('images/posts/'), $imageName);

      //  if ($image = $request->file('image')) {
        //    $image_path = $image->getRealPath();
          //  Cloudder::upload($image_path, null);
          //  Get the publicId of the image uploaded just before.
            //$publicId = Cloudder::getPublicId();
            //$logoUrl = Cloudder::secureShow($publicId, [
              //  'width'     => 200,
                //'height'    => 200
          //  ]);
          //  $post->image_path = $logoUrl;
            //$post->public_id  = $publicId;
    //    }


        
        //create the post

   //     $post = Post::create([

      //      'title' => $request->title,

         //   'description' => $request->description,

         //   'content' => $request->content,

         //   'image_path' => $logoUrl,

          //  'public_id' => $publicId,
            
          //  'category_id' => $request->category,

          //  'user_id' => auth()->user()->id,
            
         //   'published_at' => $request->published_at

      //  ]);

        if ($request->tags) {

            $post->tags()->attach($request->tags);

        }

        //flash message

        session()->flash('success', 'Post created successfully.');

        //redirect user

        return redirect(route('posts.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {

        $data = $request->only(['title', 'description', 'published_at', 'content',]);

        //check it new image

        //upload the image to storage

     
        
        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $post->image_path = $logoUrl;
            $post->public_id  = $publicId;
        }



      //  if ($request->hasFile('image')) {

            //upload it

        //    $request->image->move(public_path('images'), $imageName);

            //delete old one
          // $post->deleteImage();

            //$data['image'] = $image;

        //}

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        //update arrtibutes

        $post->update($data);

        //flash message

        session()->flash('success' , 'Post updated successfully.');

        //redirect user

        return redirect(route('posts.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if(isset($post->public_id)){
            Cloudder::destroyImage($post->public_id);
        }


        if ($post->trashed()) {

            $post->deleteImage();


            $post->forceDelete();

        } else {

            $post->delete();

        }

        session()->flash('success', 'Post deleted successfully.');


        return redirect(route('posts.index'));
        
    }

    /**
     * Display a list of all trashed posts
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trashed() {

        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->withPosts($trashed);

    }


    public function restore($id) {


        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restored successfully.');

        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Tag;

use App\Models\Post;

use App\Models\User;

class HomeController extends Controller
{
    public function index() {

        
      

        return view('home')

        ->with('categories', Category::all())

        ->with('tags', Tag::all())

        ->with('posts', Post::searched()->simplePaginate(3))
        
        ->with('users', User::all());

    }
}

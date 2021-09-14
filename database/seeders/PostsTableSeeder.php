<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;

use App\Models\Tag;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);


        $author1 = User::create([

            'name' => 'John Doe',

            'email' => 'john@doe.com',

            'password' => Hash::make('password')

        ]);

        $author2 = User::create([

            'name' => 'Jahn Doe',

            'email' => 'jahn@doe.com',

            'password' => Hash::make('password')

        ]);

        

        $post1 = Post::create([
            'title' => '  lamcorper. Vivamus feugiat massa auctor ultricies porttitor.',

            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere, quam et mole stie consectetur, ipsum dui porttitor ex, quis placerat risus justo eget dui. Nulla at digniss',

            'content' => 'im rhoncus et pharetra quis, fermentum in purus. Cras eu mi ut risus ullamcorper egestas. Aenean maximus congue metus vitae elit, nec accumsan tortor. Curabitur ut porta metus, vel luctus metus. In hac habitasse platea dictumst. Duis placerat justo quis luctus suscipit.',

            'category_id' => $category1->id,
        
            'image' => 'images/posts/hello.jpg',

            'user_id' => $author1->id

        ]);

        $post2 = $author2->posts()->create([
            'title' => '  lamcorper. Vivamus  massa auctor ultricies porttitor.',

            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere, quam et mole stie consectetur, ipsum dui porttitor ex, quis placerat risus justo eget dui. Nulla at digniss',

            'content' => 'im rhoncus et pharetra quis, fermentum in purus. Cras eu mi ut risus ullamcorper egestas. Aenean maximus congue metus vitae elit, nec accumsan tortor. Curabitur ut porta metus, vel luctus metus. In hac habitasse platea dictumst. Duis placerat justo quis luctus suscipit.',

            'category_id' => $category2->id,

            'image' => 'images/posts/hello.jpg'
        ]);

        $post3 =$author1->posts()->create([
            'title' => '   Vivamus feugiat massa auctor ultricies porttitor.',

            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere, quam et mole stie consectetur, ipsum dui porttitor ex, quis placerat risus justo eget dui. Nulla at digniss',

            'content' => 'im rhoncus et pharetra quis, fermentum in purus. Cras eu mi ut risus ullamcorper egestas. Aenean maximus congue metus vitae elit, nec accumsan tortor. Curabitur ut porta metus, vel luctus metus. In hac habitasse platea dictumst. Duis placerat justo quis luctus suscipit.',

            'category_id' => $category3->id,

            'image' => 'images/posts/hello.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => '   Vivamus feugiat massa auctor ultricies porttitor.',

            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere, quam et mole stie consectetur, ipsum dui porttitor ex, quis placerat risus justo eget dui. Nulla at digniss',

            'content' => 'im rhoncus et pharetra quis, fermentum in purus. Cras eu mi ut risus ullamcorper egestas. Aenean maximus congue metus vitae elit, nec accumsan tortor. Curabitur ut porta metus, vel luctus metus. In hac habitasse platea dictumst. Duis placerat justo quis luctus suscipit.',

            'category_id' => $category2->id,

            'image' => 'images/posts/hello.jpg'
        ]);


        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);

        $post2->tags()->attach([$tag3->id, $tag2->id]);

        $post3->tags()->attach([$tag1->id, $tag3->id]);



    }
}

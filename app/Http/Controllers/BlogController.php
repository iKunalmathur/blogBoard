<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post; 
use App\Model\Tag;
use App\Model\Category;
class BlogController extends Controller
{
  public function index()
  {
    $posts = Post::with('categories:id,title,slug')->get();
    // dd($posts);
    return view("blog",compact("posts"));
  }
  public function tag(tag $tag)
    {
         $posts = $tag->posts();
         return view('blog',compact('posts'));
    }

    public function category(category $category)
    {
         $posts = $category->posts();
         return view('blog',compact('posts'));
    }
}

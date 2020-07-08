<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
class BlogPostController extends Controller
{
  public function index(Post $post)
   {
     // dd($post);
     return view('blogPost',compact('post'));
   }
  // public function index(post $post)
  //  {
  //    dd($post);
      // $post
      // return view('welcome.blog.post',compact('post'));
   // }
   public function getAllPost()
   {
     return $posts=post::where('status',1)->orderBy('created_at','DESC')->paginate(4);
   }
}

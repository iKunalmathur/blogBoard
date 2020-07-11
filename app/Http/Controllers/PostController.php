<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\post;
use App\Model\tag;
use App\Model\category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = post::with('user:id,fname,lname')->get();
    // dd($posts);
    return view("post.show",compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    if (Auth::user()->can('posts.create')) {
    $tags = tag::all();
    $categories = category::all();
    return view('post.create',compact('tags','categories'));
  }
      return redirect()->back()->with('danger','Access Denied');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // dd($request->all());
    $request->flash();
    $this->validate($request,[
      "title" => "required",
      "subtitle" => "required",
      "slug" => "required",
      "ckeditor" => "required",
      // "image" => "required",
    ]);
    $post = new post;
    if ($request->hasFile('image')){
      $imageName = $request->image->store('public/posts_images');
      $post->image = $imageName;
    }
    $post->title = $request->title;
    $post->subtitle = $request->subtitle;
    $post->slug = $request->slug;
    $post->user_id = Auth::user()->id;
    $post->status = ($request->status) ? 1 : 0 ;
    $post->body = $request->ckeditor;
    $post->save();
    $post->tags()->sync($request->tags);
    $post->categories()->sync($request->categories);
    return redirect(route('post.index'))->with('success','Post Created');
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
  public function edit($id)
  {
    if (Auth::user()->can('posts.update')) {
    $post = post::findorfail($id);
    $tags = tag::all();
    $categories = category::all();
    return view('post.edit',compact('post','categories','tags'));
  }
      return redirect()->back()->with('danger','Access Denied');
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $this->validate($request,[
           "title" => "required",
           "subtitle" => "required",
           "slug" => "required",
           "ckeditor" => "required",
           // "image" => "required",
       ]);
       $post = post::findOrFail($id);
       if ($request->hasFile('image')){
           $imageName = $request->image->store('public/posts_images');
           $post->image = $imageName;
       }
       $post->title = $request->title;
       $post->subtitle = $request->subtitle;
       $post->slug = $request->slug;
       $post->tags()->sync($request->tags);
       $post->categories()->sync($request->categories);
       // publish status
       $post->status = ($request->status) ? 1 : 0 ;
       $post->body = $request->ckeditor;
       $isChanged = $post->isDirty();
       $post->save();
       if( $isChanged){
        // changes have been made
        return redirect()->back()->with('success','Post Update');
       }
       return redirect()->back()->with('info','No changes has been made');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    if (Auth::user()->can('posts.delete')) {
      Post::findOrFail($id)->delete();
      return redirect()->back()->with('success','Post Deleted');
    }
      return redirect()->back()->with('danger','Access Denied');
  }
}

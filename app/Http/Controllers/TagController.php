<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view("tag.show",compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tag.create");
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
      $this->validate($request,[
        'title' => ['required'],
        'slug' => ['required'],
      ]);

      $tag = new Tag;
      $tag->title = $request->title;
      $tag->slug = $request->slug;
      $tag->save();
      return redirect()->back()->with('success','Tag Created');
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
      $tag = Tag::findOrFail($id);
      return view("tag.edit",compact('tag'));
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
      // dd($request->all());
      $this->validate($request,[
        'title' => ['required'],
        'slug' => ['required'],
      ]);

      $tag = Tag::findOrFail($id);
      Tag::findOrFail($id)->update($request->except('_token','_method'));
      // $tag->title = $request->title;
      // $tag->slug = $request->slug;
      // $tag->save();
      return redirect()->route('tag.index')->with('success','Tag Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Tag::findOrFail($id)->delete();
      return redirect()->back()->with('success','Tag Deleted');
    }
}

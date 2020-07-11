<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->can('categories.view')) {
        $categories = Category::all();
        return view("category.show",compact('categories'));
      }
      return redirect()->back()->with('danger','Access Denied');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Auth::user()->can('categories.create')) {
        return view("category.create");
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
        'title' => ['required'],
        'slug' => ['required'],
      ]);

      $category = new Category;
      $category->title = $request->title;
      $category->slug = $request->slug;
      $category->save();
      return redirect()->back()->with('success','Category Created');
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
      if (Auth::user()->can('categories.update')) {
        $category = Category::findOrFail($id);
        return view("category.edit",compact('category'));
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
      // dd($request->all());
      $this->validate($request,[
        'title' => ['required'],
        'slug' => ['required'],
      ]);

      $category = Category::findOrFail($id);
      Category::findOrFail($id)->update($request->except('_token','_method'));
      // $category->title = $request->title;
      // $category->slug = $request->slug;
      // $category->save();
      return redirect()->route('category.index')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Auth::user()->can('categories.delete')) {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success','Category Deleted');
      }
      return redirect()->back()->with('danger','Access Denied');
    }
}

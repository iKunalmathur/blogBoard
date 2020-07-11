<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Permission;
use App\Model\Permission_category;
use Validator;
use Illuminate\Support\Facades\Auth;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->can('permissions.view')) {
        // code...
        $permissions = Permission::with('permission_category:id,name')->get();
        return view("permission.show",compact('permissions'));
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
      if (Auth::user()->can('permissions.create')) {
        return view("permission.create");
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
      // dd($request->title);
      $request->flash();
      $this->validate($request,[
        'title' => ['required', 'string', 'max:10'],
        'category_id' => ['required']
      ]);
      // Create new permission
      $permission = Permission::create(array('permission_category_id' => $request->category_id , 'name' => ucfirst($request->title)));
      return redirect()->route('permission.index')->with('success',"Permission Created");
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
      if (Auth::user()->can('permissions.update')) {
        $permission = Permission::with('permission_category:id,name')->findorFail($id);
        return view("permission.edit",compact('permission'));
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
          'title' => ['required', 'string', 'max:10'],
          'category_id' => ['required']
        ]);
        //Update permission
        $permission = Permission::find($id)->update(['name' => $request->title, 'permission_category_id'=>$request->category_id]);
         return redirect()->back()->with('success',"Permission Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Auth::user()->can('permissions.delete')) {
        Permission::findorFail($id)->delete();
        return redirect()->back()->with('success',"Permission Deleted");
      }
      return redirect()->back()->with('danger','Access Denied');
    }

    public function create_category(Request $request)
    {
      $cat_name = $_GET['name'];
        $validator = Validator::make($request->all(), [
            "name" => "required|unique:permission_categories",
        ]);
        if ($validator->passes()) {
          $status = Permission_category::create(array('name' => $cat_name));
			return response()->json(['success'=>'Added new Category.']);
        }
    	return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function delete_category(Request $request)
    {
      $cat_id = $_GET['id'];
      Permission_category::findorFail($cat_id )->delete();
			return response()->json(['success'=>'Category Removed']);
    }

    public function show_category()
    {
      $categories = Permission_category::select('id','name')->get();
      return response()->json(json_encode($categories));
    }
}

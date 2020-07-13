<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Permission_category;
use App\Model\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::user()->can('roles.view')) {
        // code...
        $roles = Role::with('permissions')->select("id","name")->get();
        return view("role.show",compact('roles'));
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
      if (Auth::user()->can('roles.create')) {
      $permission_categories = Permission_category::with('permission:id,name,permission_category_id')->get();
      return view("role.create",compact("permission_categories"));
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
        $this->validate($request,[
            'title' => 'required | max:15 | unique:roles,name',
            'permissions' => 'required'
        ]);
        $role = new Role;
        $role->name = $request->title;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('role.index')->with('success',"Role Created");
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
      if (Auth::user()->can('roles.update')) {
      $permission_categories = Permission_category::with('permission:id,name,permission_category_id')->get();
      $role = Role::with('permissions:id,name')->findorFail($id);
      return view("role.edit",compact("permission_categories","role"));
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
      $role = Role::findorFail($id);
      $this->validate($request,[
          'title' => 'required | max:15 | unique:roles,name,'.$role->id,
          'permissions' => 'required'
      ]);
      $role->name = $request->title;
      $role->save();
      $role->permissions()->sync($request->permissions);
      return redirect()->route('role.index')->with('success',"Role Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Auth::user()->can('roles.delete')) {
      Role::findorFail($id)->delete();
      return redirect()->route('role.index')->with('success',"Role Deleted");
    }
    return redirect()->back()->with('danger','Access Denied');
    }
}

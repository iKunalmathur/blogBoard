<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Permission_category;
use App\Model\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::with('permissions:id,name')->select("id","name")->get();
      // dd($roles);
      return view("role.show",compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permission_categories = Permission_category::with('permission:id,name,permission_category_id')->get();
      return view("role.create",compact("permission_categories"));
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
            'title' => 'required | max:15 | unique:Roles,name',
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
      $permission_categories = Permission_category::with('permission:id,name,permission_category_id')->get();
      $role = Role::with('permissions:id,name')->findorFail($id);
      // dd($role);
      return view("role.edit",compact("permission_categories","role"));
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
          'title' => 'required | max:15 | unique:Roles,name,'.$role->id,
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
      Role::findorFail($id)->delete();
      return redirect()->route('role.index')->with('success',"Role Deleted");
    }
}

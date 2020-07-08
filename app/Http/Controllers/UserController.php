<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users = User::all();
    return view("user.show",compact("users"));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $roles = Role::all();
    return view("user.create",compact("roles"));
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
      'username' => ['required', 'string', 'max:255'],
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255',],
      'password' => ['required',],
      'password_confirmation' => ['required',],
      'Admin_password' => ['required',],
    ]);

    $user = new User;

    if (Hash::check($request->Admin_password, Auth::user()->password)){
      // new password
      if(isset($request->password)){
        $this->validate($request,[
          'password' => 'confirmed|min:6',
        ]);
        $user->password = Hash::make($request->password);
        $request->session()->flash('success', 'Password Changed');
      }

      if ($request->hasFile('image')){
        $imageName = $request->image->store('public/users_image');
        $user->image = $imageName;
      }
      $request->status? $request['status']=1 : $request['status']=0;
      // dd($request->status);
      $user->status = $request->status;
      $user->username = $request->username;
      $user->fname = $request->first_name;
      $user->lname = $request->last_name;
      $user->email = $request->email;
      $user->status = $request->status;
      $isChanged = $user->isDirty();
      $user->save();
      $user->roles()->sync($request->role);
      if( $isChanged){
       // changes have been made
       return redirect()->back()->with('success','User Created');
     }
     return redirect()->back()->with('info','No changes has been made');


    }
    else{

      return redirect()->back()->with('danger', 'Admin Password does not match');
      // $request->session()->flash('error', ' Password does not match');

    }
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
    $user = User::findorFail($id);
    $roles = Role::all();
    return view("user.edit",compact('user','roles'));
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
      'username' => ['required', 'string', 'max:255'],
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255',],
      'Admin_password' => ['required',],
    ]);

    $user = User::findOrFail($id);

    if (Hash::check($request->Admin_password, Auth::user()->password)){
      // new password
      if(isset($request->password)){
        $this->validate($request,[
          'password' => 'confirmed|min:6',
        ]);
        $user->password = Hash::make($request->password);
        $request->session()->flash('success', 'Password Changed');
      }

      if ($request->hasFile('image')){
        $imageName = $request->image->store('public/users_image');
        $user->image = $imageName;
      }
      $request->status? $request['status']=1 : $request['status']=0;
      // dd($request->status);
      $user->status = $request->status;
      $user->username = $request->username;
      $user->fname = $request->first_name;
      $user->lname = $request->last_name;
      $user->email = $request->email;
      $user->status = $request->status;
      $isChanged = $user->isDirty();
      $user->save();
      $user->roles()->sync($request->role);
      if( $isChanged){
       // changes have been made
       return redirect()->back()->with('success','User details has been Updated');
     }
     return redirect()->back()->with('info','No changes has been made');


    }
    else{

      return redirect()->back()->with('danger', 'Admin Password does not match');
      // $request->session()->flash('error', ' Password does not match');

    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    User::findOrFail($id)->delete();
    return redirect()->back()->with('success','User Deleted');
  }
}

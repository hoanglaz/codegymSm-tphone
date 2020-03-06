<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(){
        if (Gate::denies('user.view')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data['users'] = User::paginate(10);
        $data['roles'] = Role::get()->all();
        return view('backend.user.index',$data);
    }
    public function show($id){
        $data['user'] = User::find($id);
        return view('backend.user.show',$data);
    }
    public function edit($id){
        if (Gate::denies('user.update')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data['users'] = User::paginate(10);
        $data['roles'] = Role::get()->all();
        $data['edit_user'] = User::find($id);
        return view('backend.user.index',$data);
    }
    public function update(UserUpdateRequest $request,$id){
        if (Gate::denies('user.update')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status = $request->status;
        $data->avatar = $request->avatar;
        $data->save();
        $role = Role::find($request->role_id);
        $data->roles()->sync($role);
        return redirect()->back()->with('message','Updated User successfully!');
    }
    public function store(UserCreateRequest $request){
        if (Gate::denies('user.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->status = $request->status;
        $data->avatar = $request->avatar;
        $data->save();
        $role = Role::find($request->role_id);
        $data->roles()->sync($role);
        return redirect()->back()->with('message','Added User successfully!');
    }
    public function delete($id){
        if (Gate::denies('user.delete')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        User::find($id)->delete();
        return redirect()->back()->with('message','Deleted User successfully!');
    }
}

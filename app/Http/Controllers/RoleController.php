<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index(){
        /*if (Gate::denies('role.view')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        $data['roles'] = Role::all();
        return view('backend.roles.index',$data);
    }
    public function create(){
       /* if (Gate::denies('role.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        return view('backend.roles.create');
    }
    public function show($id){
        return view('backend.roles.show');
    }
    public function edit($id){
//        dd(Gate::abilities());
       /* if (Gate::denies('role.update')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        $data['edit_roles'] = Role::find($id);
        $data['permissions'] = $data['edit_roles']['permissions'];
        return view('backend.roles.edit',$data);
    }
    public function store(RoleCreateRequest $request){
        /*if (Gate::denies('role.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        $data = new Role();
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->permissions = $request->permission;
        $data->save();
        return redirect()->route('roles.index')->with('message','Role created!');
    }
    public function update(RoleUpdateRequest $request,$id){
       /* if (Gate::denies('role.update')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        $data = Role::find($id);
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->permissions = $request->permission;
        $data->save();
        return redirect()->route('roles.index')->with('message','Role updated!');
    }
    public function destroy($id){
        /*if (Gate::denies('role.delete')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }*/
        $role = Role::find($id);
        /*if (Gate::allows('role.forceDelete',$role)){
            $role->delete();
            return redirect()->back()->with('message','Role deleted!');
        }else{
            return redirect()->back()->with('message','Role permission denied!');
        }*/
        $role->delete();
        return redirect()->back()->with('message','Role deleted!');
    }
    public function error(){
        return view('backend.403');
    }
}

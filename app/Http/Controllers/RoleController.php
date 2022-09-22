<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles= Role::orderBy('name')->where('name','!=','SuperAdmin')->get();
        return view('roles.index',compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::findById($id);
        $permissions= Permission::orderBy('name')->get();
        return view('roles.edit-role',compact([
            'permissions',
            'role'

        ]));
    }

    public function upd(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'permissions'=>'required',
            'permissions.*'=>'required|integer|exists:permissions,id',
        ]);

        $role = Role::findById($id);
        $role->update([
            'name'=>$request->name,
        ]);

        $permissions = Permission::whereIn('id',$request->permissions)->get();
        $role->syncPermissions($permissions);

    }

}

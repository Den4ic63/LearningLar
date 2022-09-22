<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function dashIn()
    {
        $users = User::all();
        return view('dashboard',compact('users'));
    }
    public function create()
    {
        $roles= Role::orderBy('name')->get();
        return view('add-user',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id'=>['required','integer','exists:roles,id']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'second_name'=>$request->second_name,
            'password' => Hash::make($request->password),
            'photo'=>null
        ]);
        $role = Role::find($request->role_id);
        $user->syncRoles([$role->name]);

        return redirect()->back()->with('status','User add!!');
    }

    public function edit($id)
    {
        $user = User::findorFail($id);
        $roles= Role::orderBy('name')->get();

        return view('edit-user',compact([
            'user',
            'roles'
        ]));
    }

    public function update(User $user,Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'=>['required','integer','exists:roles,id']
        ]);


        $user->update($request->all());
        $role = Role::find($request->role_id);
        $user->syncRoles([$role->name]);

        return redirect()->back()->with('status','User add!!');

    }

    public function delete($id)
    {
        User::findorFail($id)->delete();
        return redirect()->route('dashboard')->with('status','User delete');
    }

}

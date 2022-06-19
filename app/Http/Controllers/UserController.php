<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->authorize();
    }

    public function index()
    {
        $data=User::select('id','name','email','is_admin')->get();
        return view('users.index',compact('data'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $user=User::find($id);
        $roles = Role::all();
        return view('users.edit',compact(['roles','user']));
    }

    public function update(Request $request, $id)
    {
     $request->validate([
         'role'=>'required',
     ]);
     $user = User::find($id);
     $user->name=$request->name;
     $user = $user->syncRoles($request->role);
     $user->save();
     return redirect()->back()->with('message','data updated ');

    }

    public function destroy($id)
    {
    }
}

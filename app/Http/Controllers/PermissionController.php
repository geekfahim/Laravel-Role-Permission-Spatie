<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $data= Permission::all();
        $roles=Role::select('id','name')->get();
        return view('permission.index',compact(['data','roles']));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permission' => 'required',
        ]);
//        dd($request->permission);

        $role = Role::find($request->role);
        $role = $role->givePermissionTo($request->permission);
//        dd($role);
        return redirect()->back()->with('message','data updated ');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}

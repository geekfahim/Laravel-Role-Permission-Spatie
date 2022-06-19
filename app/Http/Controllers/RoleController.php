<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data=Role::all();
        return view('role.index',compact('data'));
    }

    public function create()
    {
        return view('role.create_role');
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'name'=>'required','min:2','max:120'
        ]);
        Role::create([
            'name'=>$request->name
        ]);
        return redirect()->back()->with('message','Role Created Successfully');
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

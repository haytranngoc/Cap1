<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with('roles', $roles);
    }
    public function create()
    {
        return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles|max:255'
        ]);
        Role::create($request->all());
        return redirect()->route('adminRoles');
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit')->with('role', $role);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$id
        ]);
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('adminRoles');
    }
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('adminRoles');
    }
}

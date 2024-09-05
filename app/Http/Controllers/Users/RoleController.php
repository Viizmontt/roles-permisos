<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller{

    public function index(){
        $roles = Role::all();
        return view('users.roles', compact('roles'));
    }

    public function create() {}

    public function store(Request $request){
        $validatedData = $request->validate([
            'name_role' => 'required|string|max:255|unique:roles,name',
        ]);
        $role = Role::create([
            'name' => $validatedData['name_role'],
        ]);
        $roles = Role::all();
        return view('users.model.role_permission', compact('roles'));
    }


    public function show(string $id){
        $role = Role::find($id);
        $allPermission = Permission::all();
        $rolePermission = $role->permissions->pluck('id')->toArray();
        return view('users.role_permissions', compact('role', 'allPermission', 'rolePermission', 'id'));
    }
    
    public function edit(string $id) {}

    public function update(Request $request, string $id){
        $validatedData = $request->validate([
            'name_role' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);
        $role = Role::findOrFail($id);
        $role->name = $validatedData['name_role'];
        $role->save();
        return redirect()->route('rol.index')->with('success', 'Rol actualizado exitosamente');
    }


    public function destroy(string $id){
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('rol.index')->with('success', 'Rol eliminado exitosamente');
    }


    public function updatePermission(Request $request, string $id){
        $role = Role::find($id);
        $permissionIds = $request->input('permissions', []);
        $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();
        $role->syncPermissions($permissions);
        return redirect()->route('rol.index');
    }
}

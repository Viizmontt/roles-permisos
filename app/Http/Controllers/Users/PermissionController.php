<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller{

    public function index(){
        $permissions = Permission::all();
        return view('users.permissions', compact('permissions'));
    }

    public function create() {}

    public function store(Request $request){
        $validatedData = $request->validate([
            'name_permission' => 'required|string|max:255|unique:permissions,name',
        ]);
        $permission = Permission::create([
            'name' => $validatedData['name_permission'],
        ]);
        return redirect()->route('permission.index')->with('success', 'Permiso creado exitosamente');
    }


    public function show(string $id) {}
    public function edit(string $id) {}

    public function update(Request $request, string $id){
        $validatedData = $request->validate([
            'name_permission' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);
        $permission = Permission::findOrFail($id);
        $permission->name = $validatedData['name_permission'];
        $permission->save();
        return redirect()->route('permission.index')->with('success', 'Permiso actualizado exitosamente');
    }


    public function destroy(string $id){
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('success', 'Permiso eliminado exitosamente');
    }
}

<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function index(){
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function create() {}

    public function store(Request $request){
        $validatedData = $request->validate([
            'name_user' => 'required|string|max:255|unique:users,name',
            'email_user' => 'required|string|email|max:255|unique:users,email',
            'password_user' => 'required|string|min:8',
        ]);
        $user = new User();
        $user->name = $validatedData['name_user'];
        $user->email = $validatedData['email_user'];
        $user->password = Hash::make($validatedData['password_user']);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Usuario creado exitosamente');
    }


    public function show(string $id){
        $user = User::find($id);
        $all_roles = Role::all();
        $user_roles = $user->roles->pluck('id')->toArray();
        return view('users.user_roles', compact('user', 'all_roles', 'user_roles'));
    }

    public function edit(string $id) {}

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name_user' => 'required|string|max:255|unique:users,name,' . $id,
            'email_user' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password_user' => 'nullable|string|min:8',
        ]);
        $user = User::findOrFail($id);
        $user->name = $validatedData['name_user'];
        $user->email = $validatedData['email_user'];
        if (!empty($validatedData['password_user'])) {
            $user->password = Hash::make($validatedData['password_user']);
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'Usuario actualizado exitosamente');
    }



    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
    }


    public function updateRoles(Request $request, string $id){
        $user = User::find($id);
        $roles_ids = $request->input('roles', []);
        $roles = Role::whereIn('id', $roles_ids)->pluck('name')->toArray();
        $user->syncRoles($roles);
        return redirect()->route('user.index')->with('success', 'Roles actualizados correctamente.');
    }
}

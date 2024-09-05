<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Collaborator\CommunityController;
use App\Http\Controllers\Collaborator\CustomerController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;

Auth::routes();

Route::get('/', function () { return view('auth.login'); });
Route::resource('/home', HomeController::class)->names('home');
Route::resource('/rol', RoleController::class)->names('rol');
Route::put('/rol/{id}/Permisos', [RoleController::class, 'updatePermission'])->name('rol.updatePermission');
Route::resource('/permission', PermissionController::class)->names('permission');
Route::resource('/user', UserController::class)->names('user');
Route::put('/user/{id}/Roles', [UserController::class, 'updateRoles'])->name('user.updateRoles');
Route::resource('/community', CommunityController::class)->names('community');
Route::resource('/customer', CustomerController::class)->names('customer');
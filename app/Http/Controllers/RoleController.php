<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('roles',['roles'=>$roles]);
    }

    public function permissions(Request $request){
        $id = $request->route()->parameter('id');
        $role = Role::find($id);
        return view('role_permissions',['role' => $role]);
    }
}

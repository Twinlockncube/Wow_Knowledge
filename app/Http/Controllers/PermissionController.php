<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('permissions',['permissions' => $permissions]);
    }

    public function list(Request $request){
        
    }
}

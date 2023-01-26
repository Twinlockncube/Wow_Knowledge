<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Carbon\Carbon;
use Exception;

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

    public function perm_remover(Request $request){
        $id = $request->route()->parameter('id');
        $role = Role::find($id)->with('permissions')->first();
        return view('role_perm_remove',['role' => $role]);
    }

    public function add_perm(Request $request){
        try{
            $role = Role::find($request->input('role_id'));
            $permission = $request->input('permission_id');
            $role->permissions()->attach($permission,['date' => Carbon::now()]);
            return redirect()->back()->with('message', 'Permission Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('message', $e->getMessage());
        }
    }

    public function rem_perm(Request $request){
        try{
            $role = Role::find($request->input('role_id'));
            $permission = $request->input('permission_id');
            $role->permissions()->detach($permission);
            return redirect()->back()->with('message', 'Permission Removed Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('message', $e->getMessage());
        }
    }
}

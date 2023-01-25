<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users =  User::with('role')->get();
        //dd($users);
        return view('users',
            ['users' => $users] 
        );
    }

    public function list(Request $request){
        
    }
}

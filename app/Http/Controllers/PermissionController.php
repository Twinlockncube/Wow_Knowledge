<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('permissions');
    }

    public function list(Request $request){
        
    }
}
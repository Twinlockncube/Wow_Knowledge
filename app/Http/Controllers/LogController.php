<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function log_last(){
        $user = Auth::user();
        $log = new Log([
            'user_id' => $user->id,
            'last_login_date_time' => Carbon::now()
        ]);
        if($log->save()){
            session(['logged'=>true]);
        };
    }
}

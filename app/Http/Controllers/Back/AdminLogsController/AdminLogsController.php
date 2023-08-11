<?php

namespace App\Http\Controllers\Back\AdminLogsController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLogsController extends Controller
{
    public function adminListLogs(){
        $admins = User::where([['is_admin','1'],['is_superadmin','0']])->get();
        return view('back.logs.list',compact('admins'));
    }
}

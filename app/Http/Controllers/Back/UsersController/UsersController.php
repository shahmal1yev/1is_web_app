<?php

namespace App\Http\Controllers\Back\UsersController;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function userList(){
        $users = User::orderBy('created_at','DESC')->get();
        return view('back.users.list',compact('users'));
    }
    public function userDelete(Request $request){
        $cv = User::find($request->id);
        if(!$cv){
            return '0';
        }
    
        return $cv->delete() ? '1' : '0';
    }
    
    
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class HelperController extends Controller
{
    public function ChangeUserData()
    {
        $users = User::get();
        echo "<pre>", print_r($users->toArray()), "</pre>";


        return view('back.help', compact(
            'users'
        ));
    }
}

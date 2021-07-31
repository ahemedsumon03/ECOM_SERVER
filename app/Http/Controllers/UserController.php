<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function AddUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        date_default_timezone_set('Asia/Dhaka');
        $createUser_time = date('h:i:sa');
        $createUser_date = date('d-m-Y');

        $getUsername = UserModel::where('username',$name)->count();

        if($getUsername>0)
        {
            return -1;
        }else{
            $result = UserModel::insert([
                'username'=>$name,
                'email'=>$email,
                'password'=>$password,
                'create_time'=>$createUser_time,
                'create_date'=>$createUser_date
            ]);
            return $result;
        }
    }

    function GetUser(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $result = UserModel::where('username',$name)->where('password',$password)->count();

        if($result>0)
        {
            return 1;
        }
        else{
            return 0;
        }
    }
}

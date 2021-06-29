<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function register(Request $req) {

        $user = new User;
        $user->username= $req->input('username');
        $user->password= Hash::make($req->input('password'));
        $user->save();

        return $user;
    }

    function login(Request $req){

        $user = User::where('username', $req->username)->first();

        // if user is blank or password does not match
        if(!$user || !Hash::check($req->password,$user->password)){
            return ["error" => 'Incorrect username or password'];
        }
        return $user;

    }

    function updateaccount(Request $req){

        $data = User::find($req->userid);

        if(!$req->newpassword){
            $data->username=$req->username;
            $data->save();
        } else {
            $data->username=$req->username;
            $data->password=Hash::make($req->newpassword);
            $data->save();
        }

        return $data;

        

    }
}

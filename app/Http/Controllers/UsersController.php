<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index($id){
        $user = User::where('id',$id)->firstOrFail();
        $details = $user->details;
        return view('users.index',['user'=>$user,'details'=>$details]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        dd('123');
        redirect('/login');
    }

    public function show($id){
        $user = User::where('id',$id)->firstOrFail();
        $details = $user->details;
        return view('users.show',['user'=>$user,'details'=>$details]);
    }
}

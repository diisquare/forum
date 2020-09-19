<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
       return redirect('/login');
    }

    public function show($id){
        $user = User::where('id',$id)->firstOrFail();
        $details = $user->details;
        $replies = $user->replies;
        $articles = $user->articles;
        $posts = $user->posts;
        return view('users.show',['user'=>$user,'details'=>$details,
                                        'replies'=>$replies,
                                        'articles'=>$articles,"posts"=>$posts]);
    }
}

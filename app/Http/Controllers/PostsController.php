<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Services\ReplyManager;

class PostsController extends Controller
{
    public function show($id){
        $post = Post::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$post->publisherId)->firstOrFail();
        $replies = $post->replies();
        return view('posts.show',['post'=>$post,'user'=>$user,'replies'=>$replies]);
    }
}

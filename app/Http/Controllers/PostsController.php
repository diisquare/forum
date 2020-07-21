<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\User;
use App\Http\Services\ReplyManager;

class PostsController extends Controller
{
    public function index($id){
        $post = Post::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$post['publisherId'])->firstOrFail();
        $replyManager = new ReplyManager();
        $replies=$replyManager->getReplies($post['replies']);
        return view('posts.index',['post'=>$post,'user'=>$user,'replies'=>$replies]);
    }
}

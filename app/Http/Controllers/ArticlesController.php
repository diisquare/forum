<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index($id){
        $article = Article::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$article['publisherId'])->firstOrFail();
        return view('articles.index',['article'=>$article,'user'=>$user]);
    }
}

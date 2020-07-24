<?php

namespace App\Http\Controllers;

use App\Http\Services\ReplyManager;
use App\User;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleCreateRequest;

class ArticlesController extends Controller
{
    public function show($id){
        $article = Article::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$article['publisherId'])->firstOrFail();
        $replyManager = New ReplyManager($article->replies);
        $replies = $replyManager->getReplies();
        return view('articles.show',['article'=>$article,'user'=>$user,'replies'=>$replies]);
    }

    public function create(){
        return view('articles.create');
        //TODO: send sectionId and login check
    }

    public function store(ArticleCreateRequest $request){
        //TODO: error report
        dd($request->get('title'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Section;
use App\User;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check')->only('create','store','edit','upload','destroy');
    }

    protected $fields = [
        'title' => '',
        'content' => '',
        'sid' => '',
        'publisherId'=>'',
        'repliesStr'=>'',
        'published_at'=> '',
        'updated_at'=>'',
    ];

    public function show($id){
        $article = Article::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$article['publisherId'])->firstOrFail();
        $replies = $article->replies();
        return view('articles.show',['article'=>$article,'user'=>$user,'replies'=>$replies]);
    }

    public function create(){
        $sections = DB::table('sections')->get();
        return view('articles.create',['sections'=>$sections]);
    }

    public function store(ArticleCreateRequest $request){
        //TODO: error report
        $article = new Article();
        foreach (array_keys($this->fields) as $field){
            $article->$field = $request->get($field);
        }
        $article->publisherId=Auth::id();
        $now =  Carbon::now()->addHour();
        $article->published_at = $now->format('Y-m-d g:i');
        $article->save();
        return redirect(route('articles.show',$article->id))
            ->with('success','文章「' . $article->title . '」发布成功');
    }

    public function edit($id){
        $article = Article::where('id',$id)->firstOrFail();
        if ($article->publisherId!=Auth::id())
            return 403;//TODO:403
        $sections = DB::table('sections')->get();
        return view('articles.edit',['article'=>$article,'sections'=>$sections]);
   }

   public function update(ArticleUpdateRequest $request,$id){
        $article = Article::where('id',$id)->firstOrFail();
        $data = $request->all();
        $article->fill($data);
        $article->save();
//        todo : change section
       return redirect(route('articles.show',$id))
           ->with('success','文章「' . $article->title . '」更新成功');
   }

   public function destroy($id){
       $article = Article::where('id',$id)->firstOrFail();
       if ($article->publisherId!=Auth::id())
           return 403;//TODO:403
       //todo section detach
       $sid = $article->sid;
       $section = Section::where('id',$sid)->firstOrFail();
       $title = $section->title;
       $article->delete();
       return redirect()
           ->route('sections.index',$title)
           ->with('success','文章「' . $article->title . '」删除成功');
   }
}

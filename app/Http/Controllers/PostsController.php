<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\Section;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    protected $fields = [
        'title' => '',
        'content' => '',
        'sid' => '',
        'publisherId'=>'',
        'repliesStr'=>'',
    ];

    public function show($id){
        $post = Post::where('id',$id)->firstOrFail();
        //        TODO:匿名功能
        $user = User::where('id',$post->publisherId)->firstOrFail();
        $replies = $post->replies();
        return view('posts.show',['post'=>$post,'user'=>$user,'replies'=>$replies]);
    }

    public function create(){
        $sections = DB::table('sections')->get();
        return view('posts.create',['sections'=>$sections]);
    }

    public function store(PostCreateRequest $request){
        //TODO: error report
        $post = new post();
        foreach (array_keys($this->fields) as $field){
            $post->$field = $request->get($field);
        }
        $post->publisherId=Auth::id();
        $now =  Carbon::now()->addHour();
        $post->published_at = $now->format('Y-m-d g:i');
        $post->save();
        return redirect(route('posts.show',$post->id))
            ->with('success','问题「' . $post->title . '」发布成功');
    }

    public function edit($id){
        $post = post::where('id',$id)->firstOrFail();
        if ($post->publisherId!=Auth::id())
            return 403;//TODO:403
        $sections = DB::table('sections')->get();
        return view('posts.edit',['post'=>$post,'sections'=>$sections]);
    }

    public function update(PostUpdateRequest $request,$id){
        $post = post::where('id',$id)->firstOrFail();
        $data = $request->all();
        $post->fill($data);
        $post->save();
//        todo : change section
        return redirect(route('posts.show',$id))
            ->with('success','问题「' . $post->title . '」更新成功');
    }

    public function destroy($id){
        $post = Post::where('id',$id)->firstOrFail();
        if ($post->publisherId!=Auth::id())
            return 403;//TODO:403
        //todo section detach
        $sid = $post->sid;
        $section = Section::where('id',$sid)->firstOrFail();
        $title = $section->title;
        try {
            $post->delete();
        } catch (\Exception $e) {
            return redirect()
                ->route('sections.index',$title)
                ->with('problem','问题「' . $e . '」删除成功');
        }
        return redirect()
            ->route('sections.index',$title)
            ->with('success','问题「' . $post->title . '」删除成功');
    }


}

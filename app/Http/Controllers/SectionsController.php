<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Section;
use Illuminate\Http\Request;


class SectionsController extends Controller
{
    public function index($title){
        $section = Section::where('title',$title)->firstOrFail();
        $articles = Article::where('sid',$section->id)
                ->orderBy('published_at', 'desc')
                ->paginate(3);
        return view('sections.index',compact('articles'));
    }
}

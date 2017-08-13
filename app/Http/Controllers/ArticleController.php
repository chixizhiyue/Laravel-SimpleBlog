<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Parsedown;

require_once __DIR__ . '/../../Parsedown.php';

class ArticleController extends Controller
{

    public function index()
    {
    	$article = Article::latest()->Paginate(3);
        //$article = DB::table('articles');
        //sdd($article);
        return view('index',compact('article'));
    }

    public function show($id)
    {
    	$article = Article::findOrFail($id);
        return view('post',compact('article'));
    }

    public function redirect()
    {
        return redirect('/');
    }

    public function create()
    {
        return view('create');
    }

   public function store(Requests\CreatePost $request)
    {
        $input = $request->all(); 
        $action = array_merge(['user_id'=>\Auth::user()->id],$input);
        //dd($action);
        Article::create($action);
        //dd($input);
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit',compact('article'));
    }

   public function update(Requests\CreatePost $request,$id)
    {
        $input = $request->all(); 
        //Article::update($input);
        $article = Article::findOrFail($id);
        //dd($input);
        if($article->user_id==$request->edit_user)
            $article->update($input);
        else
            return "Error!";

        return redirect('/post/'.$id);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/');
    }

    public function mine($id)
    {
        $article = \App\User::findOrFail($id)->article;
        //dd($article);
        return view('my',compact('article'));
    }

}

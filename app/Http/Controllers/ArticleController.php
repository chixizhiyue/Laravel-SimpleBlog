<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $category = Category::all();
        return view('create')->with("category",$category);
    }

   public function store(Requests\CreatePost $request)
    {
        $input = $request->all();
        $input["cat"] = Category::whereRaw("slug='".$input["cat"]."'")->first()->id;
        $action = array_merge(['user_id'=>\Auth::user()->id],$input);
        //dd($action);
        Article::create($action);
        //dd($input);
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $category = Category::all();
        return view('edit',compact('article'))->with("category",$category);
    }

   public function update(Requests\CreatePost $request,$id)
    {
        $input = $request->all(); 
        //Article::update($input);
        $input["cat"] = Category::whereRaw("slug='".$input["cat"]."'")->first()->id;
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
    public function cat_index()
    {
        if(Auth::user()):
        $category = Category::all();
        return view('category',compact('category'));
        endif;
        return redirect('/');
    }
    public function cat_store(Request $request)
    {
        if(Auth::user()):
            $input = $request->all();
            Category::create($input);
            //dd($input);
            return redirect('/category');
        endif;
    }
    public function cat_delete($id)
    {
        if(Auth::user()):
            $cat = Category::findOrfail($id);
            $cat->delete();
            //dd($input);
            return redirect('/category');
        endif;
    }
    public function cat_edit($id)
    {
        if(Auth::user()):
            $cat = Category::findOrfail($id);
            $category = Category::all();
            return view('cat_edit',compact('category'))->with("cat_do",$cat);
        endif;
    }
    public function cat_update(Request $request,$id)
    {
        if(Auth::user()):
            $cat = Category::findOrfail($id);
            $input = $request->all();
            //dd($input);
            $cat->update($input);
            return redirect('/category');
        endif;
    }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tags;

class ArticlesController extends Controller
{
    public function index()
    {   
        if(request('tag')){
            $articles = Tags::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::orderBy('id', 'DESC')->paginate(2); //simplePaginate 
        }
        return view('articles.index', ['articles'=>$articles]);

    }
    public function show(Article $article)
    {     
        return view('articles.show', ['article'=>$article]);
    }
    public function create()
    {          
        return view('articles.create', [
            'tags' => Tags::all()
        ]);
    }
    public function store()
    { 
        /*$validatedAtrributes = request()->validate([
            'title' => ['required','min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]); 
        Article::create($validatedAtrributes);
        */     
        $this->ValidateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();        
        if(request()->has('tags')){
            $article->tags()->attach(request('tags'));
        }
        //return redirect('/articles');
        return redirect(route('articles.index'));
    }
    public function edit(Article $article)
    {                  
        $tags = Tags::all();
        
        return view('articles.edit', [
                    'article'=>$article,
                    'article_tags' => $article->tags->pluck('id'),
                    'tags'=>$tags]);
    }
    public function update(Article $article)
    {        
        /*$validatedAtrributes = request()->validate([
            'title' => ['required','min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);        
        $article->update($validatedAtrributes);*/
        $this->ValidateArticle();  
        $article->update(request(['title', 'excerpt', 'body']));

        $article->tags()->sync(request('tags'));

       // return redirect('/articles/'.$article->id);
       return redirect(route('articles.show', $article));

    }
    protected function ValidateArticle()
    {
       // dd(request()->all());
        $validatedAtrributes = request()->validate([
            'title' => ['required','min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => ['required', 'exists:tags,id']
        ]); 
        return $validatedAtrributes;
    }
}

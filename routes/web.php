<?php

use Illuminate\Support\Facades\Route;

use App\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');

    /* example to understand the service container 
    $container = new \App\Container();
    $container->bind('example', function (){
        return new App\Example();
    });
    $example = $container->resolve('example');
    ddd($example->go());
    */
    /*app()->bind('example', function (){
        $dependentval = config('services.somevar'); 
        return new App\Example($dependentval);
    });
    $example = resolve('example');
    ddd($example->getVar());*/

});
Route::get('/di', 'PagesController@home');
Route::get('/facde', 'PagesController@getFile');
Route::get('/cahe', 'PagesController@getCacheVar');

Route::get('/about', function () {
    $article = Article::latest()->take(3)->get();    
    return view('about', ['articles'=>$article]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit');
Route::put('/articles/{article}', 'ArticlesController@update')->name('articles.update');

Route::get('/posts/{post}', 'PostsController@show');
Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Example;

use Illuminate\Support\Facades\File;
//use \Illuminate\Filesystem\Filesystem;

use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{

    public function home()
    { 
      //ddd(new \App\Example('somevalue')); //Is it not using service container??
       // ddd(resolve('App\Example'),resolve('App\Example'));
        $example = resolve('App\Example');
        //ddd($example);
       ddd($example->getVar());
    }
    
    public function getFile() //Filesystem $file
    {        
        return File::get(public_path('index.php'));
       // return $file->get(public_path('index.php'));       
    }
    public function getCacheVar()
    {
        Cache::remember('foo', 60, function(){
                return 'some value';
        });

        return Cache::get('foo');
    }
}

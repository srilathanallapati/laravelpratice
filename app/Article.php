<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //protected $fillable = ['title','excerpt','body'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id'); // when 2 arg (i.e FK) is not given, find method returned null 
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tags','articles_tags', 'article_id', 'tag_id')
                    ->withTimestamps();
    }
}

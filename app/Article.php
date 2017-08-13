<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $table = 'articles';
    protected $fillable=['title','post','img','published_at','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

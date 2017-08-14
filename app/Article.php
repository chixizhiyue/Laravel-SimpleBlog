<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $table = 'articles';
    protected $fillable=['title','post','img','published_at','cat','tags','description','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

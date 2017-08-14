<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categorys';
    protected $fillable=['value', 'slug'];

    public function article()
    {
        return $this->hasMany('App\Article','cat');
    }
}

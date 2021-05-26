<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // abilito mass assignment
    protected $guarded = ['tags'];

    // definisco relazione one to many con tabella comments
    public function comments() {

        return $this->hasMany('App\Comment');
    }

    // definisco relazione many to many con tabella tags
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}

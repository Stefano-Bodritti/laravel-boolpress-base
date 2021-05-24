<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // abilito mass assignment
    protected $guarded = [];

    // definisco relazione one to many tra le tabelle
    public function comments() {

        return $this->hasMany('App\Comment');
    }
}

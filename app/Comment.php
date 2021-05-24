<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // abilito mass assignment
    protected $guarded = [];

    // definisco relazione one to many (inversa!) tra le tabelle
    public function post() {

        return $this->belongsTo('App\Post');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // abilito mass assignment
    protected $guarded = [];

    // definisco relazione many to many con tabella posts
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name'];
    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}

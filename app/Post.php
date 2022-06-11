<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable =[
        'caption','description','image','thumbnail'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}

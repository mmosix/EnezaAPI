<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','answer'
    ];

    public function options()
    {
     $this->hasMany(Option::class);
    }

    public function quizzes()
    {
        $this->belongsTo(Quiz::class);
    }
}

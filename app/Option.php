<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'choice', 'question_id'
    ];
    
    public function questions()
    {
        $this->belongsTo(Question::class);
    }
}

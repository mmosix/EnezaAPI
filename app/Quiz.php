<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=[
        'title','subject_id', 'description'
    ];

    public function questions()
    {
     $this->hasMany(Question::class);
    }

    public function subjects()
    {
        $this->belongsTo(Subject::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'course_id', 'title', 'description'
    ];
    
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
    
}

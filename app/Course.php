<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description'
    ];
    
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

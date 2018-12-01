<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'subject_id', 'title', 'content'
    ];
    
    public function subjects()
    {
        $this->belongsTo(Subject::class);
    }
}

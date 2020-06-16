<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dance extends Model
{
    protected $fillable = [
        'performer', 'choreography', 'execution', 'aesthetic', 'costume'
    ];

    protected $primaryKey = 'danceID';
    protected $table = 'dances';
}

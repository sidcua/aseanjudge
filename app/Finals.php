<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finals extends Model
{
    protected $fillable = [
        'performer', 'beauty', 'ability', 'overall'
    ];

    protected $primaryKey = 'finalsID';
    protected $table = 'final';
}

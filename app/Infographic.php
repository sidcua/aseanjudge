<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    protected $fillable = [
        'performer', 'editing', 'cinematography', 'creativity', 'artistic'
    ];

    protected $primaryKey = 'infographicID';
    protected $table = 'infographics';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    protected $fillable = [
        'performer', 'beauty', 'poise', 'projection', 'appropriateness', 'overall'
    ];

    protected $primaryKey = "sportsID";
    protected $table = "sports_wear";
}

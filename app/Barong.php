<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barong extends Model
{
    protected $fillable = [
        'performer', 'beauty', 'poise', 'projection', 'appropriateness', 'overall'
    ];

    protected $primaryKey = "barong_ternoID";
    protected $table = "barong_tagalog_terno";
}

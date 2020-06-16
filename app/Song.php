<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'performer', 'content', 'melody', 'accompaniment', 'interpretation', 'harmony'
    ];

    protected $primaryKey = "songID";
    protected $table = "songs";
}

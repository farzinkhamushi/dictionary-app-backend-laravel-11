<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Synonym extends Model
{
    protected $fillable = [
        'similars' , 'word_id'
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}

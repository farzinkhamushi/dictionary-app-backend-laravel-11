<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antonym extends Model
{
    protected $fillable = [
        'opposits' , 'word_id'
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}

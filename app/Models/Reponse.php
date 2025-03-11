<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'is_correct' ,'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function userReponse()
        {
            return $this->hasMany(UserReponse::class);
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','description1', 'description2', 'created_at', 'updated_at'];
<<<<<<< HEAD
=======

    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_corps_id');
    }
>>>>>>> 758af20ded3cd43b4cd55039958b1f3c10f229d7
}

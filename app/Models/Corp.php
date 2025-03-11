<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','description1', 'description2', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_corps_id');
    }
}

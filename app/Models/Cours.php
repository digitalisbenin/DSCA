<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = ['name','image_url', 'description','description1', 'description2', 'created_at', 'updated_at'];

    public function formations()
    {
        return $this->hasMany('App\Models\Formation');
    }
    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }
}

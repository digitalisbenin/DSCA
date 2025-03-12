<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = ['name','image_url', 'objectifs','nombre_module', 'description2', 'created_at', 'updated_at'];

   
    public function module()
    {
        return $this->hasMany('App\Models\Module');
    }
}

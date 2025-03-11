<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','description1', 'description2', 'created_at', 'updated_at'];


    public function postes()
    {
        return $this->hasMany('App\Models\Poste', 'service_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'service_user_id');
    }

    
}

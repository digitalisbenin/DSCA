<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    protected $fillable = ['name','service_id', 'description','description1', 'description2', 'created_at', 'updated_at'];

    public function services()
    {
        return $this->belongsTo('App\Models\Service', 'service_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'post_user_id');
    }
}

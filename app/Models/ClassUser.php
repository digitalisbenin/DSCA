<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassUser extends Model
{
   /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_class_id');
    }
    
    public function affecter()
    {
        return $this->hasMany('App\Models\Affecter');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiveauDificulte extends Model
{
    use HasFactory;

     /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    

    public function modules()
    {
        return $this->hasMany('App\Models\Module', 'difficulte_id');
    }
}

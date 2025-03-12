<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affecter extends Model
{
    use HasFactory;

    protected $fillable = ['module_id','niveau_difficulte_id','user_class_id','categorie_id' ,'created_at', 'updated_at'];


    public function userClass()
    {
        return $this->belongsTo('App\Models\ClassUser', 'user_class_id');
    }

    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }
    
    public function categorie()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function niveu_difficulte()
    {
        return $this->belongsTo('App\Models\NiveauDificulte');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

     /**
     * @var array
     */
    protected $fillable = ['user_id', 'categorie_id' ,'user_class_id','cours_id', 'difficulte_id','nombre_chapitre', 'titre', 'description', 'image_url', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }
    public function userClass()
    {
        return $this->belongsTo('App\Models\ClassUser', 'user_class_id');
    }

    public function cours()
    {
        return $this->belongsTo('App\Models\Cours');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chapitres()
    {
        return $this->hasMany('App\Models\Chapitre');
    }

    public function notequiz()
    {
        return $this->hasMany('App\Models\Notequiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categorie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function niveaudifficulete()
    {
        return $this->belongsTo('App\Models\NiveauDificulte', 'difficulte_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mesCours()
    {
        return $this->hasMany('App\Models\MesCour');
    }
    public function mesModules()
    {
        return $this->hasMany('App\Models\MesModule');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quizzes()
    {
        return $this->hasMany('App\Models\Quiz');
    }
}

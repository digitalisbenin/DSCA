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
    protected $fillable = ['user_id','cours_id','numero_module', 'nombre_chapitre', 'titre', 'description', 'image_url', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany 
     */
    public function certificate()
    {
        return $this->hasMany('App\Models\Certificate');
    }

    public function affecter()
    {
        return $this->hasMany('App\Models\Affecter');
    }

    public function suivies()
    {
        return $this->hasMany('App\Models\Suivy');
    }
    public function commentaire()
    {
        return $this->hasMany('App\Models\Commentaire');
    }

    public function cours()
    {
        return $this->belongsTo('App\Models\Cours');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

    public function notequiz()
    {
        return $this->hasMany('App\Models\Notequiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   

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
   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
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

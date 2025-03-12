<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $chapitre_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property Chapitre $chapitre
 * @property User $user
 */
class Commentaire extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'module_id', 'content','reponse', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

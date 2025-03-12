<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notequiz extends Model
{
    use HasFactory;

    protected $fillable = ['module_id', 'user_id','quiz_id','description','status','titre','note', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

   

    
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }
  
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }
}

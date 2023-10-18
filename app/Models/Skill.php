<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
use App\Models\Expertise;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','libelle','description','statut'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function expertises(){
        return $this->hasmay(Experise::class,'skill_id','id');
    }
}

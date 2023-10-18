<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','projet_id','libelle','statut'];
    
    public function projet(){
        return $this->belongsTo(Projet::class,'projet_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

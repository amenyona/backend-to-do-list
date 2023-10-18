<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Skill;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','libelle','description','statut'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function skill(){
        return $this->belongsTo(Skill::class,'skill_id','id');
    }
}

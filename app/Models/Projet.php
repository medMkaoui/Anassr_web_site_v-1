<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'responsable',
        'type',
        'encadreur',
        'lieu',
        'date_debut',
        'date_fin',
        'dure'
    ];
    public function video()
    {
        return $this->hasMany(videos::class,'id_proj');
    }

    public function photo()
    {
        return $this->hasMany(Photo::class,'id_proj');
    }

    public function Partenaire()
    {
        return $this->hasMany(Projet_partenaires::class,'id_proj');
    }

    public function activites()
    {
        return $this->hasMany(activite::class,'id_proj');
    }
}

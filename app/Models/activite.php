<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'name',
        'id_proj',
        'detail',
        'responsable',
        'type',
        'encadreur',
        'lieu',
        'date_debut',
        'date_fin',
        'dure'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class,'id_proj');
    }

    public function video()
    {
        return $this->hasMany(Videos::class,'id_activite');
    }

    public function photo()
    {
        return $this->hasMany(Photo::class,'id_activite');
    }
}
 
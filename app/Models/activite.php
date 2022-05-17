<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'responsable',
        'type',
        'lieu',
        'date_debut',
        'date_fin',
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
 
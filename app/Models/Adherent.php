<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'adresse', 'image', 'lieu_naissance',   
         'nationalite', 'date_naissance', 'ville', 'profession', 'cin', 'niveau_scolaire', 
         'nom_titure', 'prenom_titure', 'email_titure', 'tel_titure', 'cin_titure', 'read_statu'
    ];
}

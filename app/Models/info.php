<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
   protected $fillable = ['nom',  'slug', 'whatsapp', 'fb', 'instagram', 'youtube', 'video_apropos','video_support',
   'rib', 'nom_banque', 'tel_trisorie','adresse', 'mot_president','vision', 'how_we_work', 'how_support_us'];
}

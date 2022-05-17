<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
   protected $fillable = ['whatsapp', 'fb', 'instagram', 'youtube','linkdin', 'video_apropos','video_support',
   'adresse', 'mot_president','vision', 'how_we_work', 'how_support_us', 'txtAdheration'];
}

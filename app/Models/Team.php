<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=[
        'first_name',
        'last_name',
        'statu',
        'photo',
        'description',
        'mail',
    ];
}

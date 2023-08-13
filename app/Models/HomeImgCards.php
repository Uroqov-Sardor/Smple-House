<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeImgCards extends Model
{
    use HasFactory;

    protected $fillable = ['cardImg',
        'cardTitle',
        'cardTitle_en',
        'cardTitle_ru',
        'cardTitle_uz',
        'cardText',
        'cardText_en',
        'cardText_ru',
        'cardText_uz',
        'cardPrice',
        'user_id'];

    function users() {
        return $this->belongsTo('App\Models\User');
    }
}

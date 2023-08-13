<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = ['title',
            'title_en',
            'title_ru',
            'title_uz',
            'paragraph',
            'paragraph_en',
            'paragraph_ru',
            'paragraph_uz',
            'cardImg',
            'cardTitle',
            'cardTitle_en',
            'cardTitle_ru',
            'cardTitle_uz',
            'cardText',
            'cardText_en',
            'cardText_ru',
            'cardText_uz',
            'user_id'];

    function users() {
        return $this->belongsTo('App\Models\User');
    }
}

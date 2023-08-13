<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    // HOME MODELS
    function homePosts() {
        return $this->hasMany('App\Models\Home');
    }

    function homeCardPosts() {
        return $this->hasMany('App\Models\HomeImgCards');
    }

    function homeCardSaladPosts() {
        return $this->hasMany('App\Models\HomeCardSalad');
    }

    function homeCardNoodlePosts() {
        return $this->hasMany('App\Models\HomeCardNoodle');
    }

    // ABOUT MODELS
    function aboutPosts() {
        return $this->hasMany('App\Models\About');
    }

    function aboutCardTeamPosts() {
        return $this->hasMany('App\Models\AboutCardTeam');
    }

    function aboutCardOfferPosts() {
        return $this->hasMany('App\Models\AboutCardOffer');
    }

    // CONTATC MODELS
    function contactCardPosts() {
        return $this->hasMany('App\Models\Contact');
    }

    function contactCardFaqPosts() {
        return $this->hasMany('App\Models\ContactCardFaq');
    }

    function contactCardFaqDataPosts() {
        return $this->hasMany('App\Models\ContactCardFaqData');
    }
}

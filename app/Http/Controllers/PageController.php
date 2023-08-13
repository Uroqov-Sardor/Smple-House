<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutCardOffer;
use App\Models\AboutCardTeam;
use App\Models\ConatctLocation;
use App\Models\Contact;
use App\Models\ContactCardFaq;
use App\Models\ContactCardFaqData;
use App\Models\ContactMessage;
use App\Models\Home;
use App\Models\HomeCardNoodle;
use App\Models\HomeCardSalad;
use App\Models\HomeImgCards;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

use function Ramsey\Uuid\v1;

class PageController extends Controller
{

    // ********************************* SIMPLE ***************************** //
    #-------------------------------------------------------------------------#
                                    ##--- HOME ---##
    #-------------------------------------------------------------------------#
    public function homePage() {
      $homes = Home::findOrFail(1);
      $homeCards = HomeImgCards::all();
      $cardSalads = HomeCardSalad::all();
      $cardNoodles = HomeCardNoodle::all();
      return view('home',compact('homes', 'homeCards', 'cardSalads', 'cardNoodles'));
    }


    #-------------------------------------------------------------------------#
                                    ##--- ABOUT ---##
    #-------------------------------------------------------------------------#
    public function aboutPage() {
      $about = About::findOrFail(1);
      $cardTeam = AboutCardTeam::all();
      $cardOffer = AboutCardOffer::all();
      return view('about',compact('about', 'cardTeam', 'cardOffer'));
    }


    #-------------------------------------------------------------------------#
                                    ##--- CONTACT ---##
    #-------------------------------------------------------------------------#
    public function contactPage() {
      $contact = Contact::findOrFail(1);
      $cardFaq = ContactCardFaq::findOrFail(1);
      $cardFaqData = ContactCardFaqData::all();
      $contactLocation = ConatctLocation::findOrFail(1);
      return view('contact',compact('contact', 'cardFaq', 'cardFaqData', 'contactLocation'));
    }


    // ********************************** ADMIN ***************************** //
    #-------------------------------------------------------------------------#
                                    ##--- LOGIN ---##
    #-------------------------------------------------------------------------#
    public function loginPage() {
      return view('login');
    }


    #-------------------------------------------------------------------------#
                                    ##--- DASHMIN ---##
    #-------------------------------------------------------------------------#
    public function dashminPage() {
      $admin = User::findOrFail(1);
      return view('admin.dashmin',['admins'=>$admin]);
    }

    #-------------------------------------------------------------------------#
                                    ##--- ADMIN HOME ALL ---##
    #-------------------------------------------------------------------------#
    public function homeAllPage() {
      $homes = Home::all();
      $admins = User::findOrFail(1);
      return view('admin.home.home-all',compact('homes','admins'));
    }

    // Home edit
    public function homeEditPage($id) {
      $home = Home::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.home.home-edit',compact('home','admins'));
    }

    #-------------------------------------------------------------------------#
                                    ##--- ADMIN HOME ADD ---##
    #-------------------------------------------------------------------------#
    public function homeAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.home.home-add',compact('admins'));
    }


    #-------------------------------------------------------------------------#
                                ##--- ADMIN HOME CARD IMAGES ---##
    #-------------------------------------------------------------------------#
    public function homeCardImages() {
      $homeCards = HomeImgCards::all();
      $admins = User::findOrFail(1);
      return view('admin.home.home-card-image',compact('homeCards','admins'));
    }

    // Home card img edit
    public function homeCardImgEditPage($id) {
      $homeCard = HomeImgCards::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.home.home-card-edit',compact('homeCard','admins'));
    }


    #-------------------------------------------------------------------------#
                            ##--- ADMIN HOME CARD IMAGES ADD ---##
    #-------------------------------------------------------------------------#
    public function homeCardImageAdd() {
      $admins = User::findOrFail(1);
      return view('admin.home.home-card-image-add',compact('admins'));
    }


    #-------------------------------------------------------------------------#
                            ##--- ADMIN HOME CARDS ---##
    #-------------------------------------------------------------------------#
    
    // Home card salad all
    public function homeCardSaladAllPage() {
      $cardSalads = HomeCardSalad::all();
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-salad-all',compact('cardSalads','admins'));
    }

    // Home card salad add
    public function homeCardSaladAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-salad-add',compact('admins'));
    }

    // Home card salad edit 
    public function homeCardSaladEditPage($id) {
      $cardSalad = HomeCardSalad::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-salad-edit',compact('cardSalad','admins'));
    }

    // Home card noodle all
    public function homeCardNoodleAllPage() {
      $cardNoodles = HomeCardNoodle::all();
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-noodle-all',compact('cardNoodles','admins'));
    }

    // Home card noodle add
    public function homeCardNoodleAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-noodle-add',compact('admins'));
    }

    // Home card noodle edit
    public function homeCardNoodleEditPage($id) {
      $cardNoodle = HomeCardNoodle::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.home.cards.card-noodle-edit',compact('cardNoodle','admins'));
    }


    #-------------------------------------------------------------------------#
                            ##--- ADMIN ABOUT CARDS ---##
    #-------------------------------------------------------------------------#
    
    // About card all
    public function aboutCardAllPage() {
      $about = About::findOrFail(1);
      $admins = User::findOrFail(1);
      return view('admin.about.card-all',compact('about','admins'));
    }

    // About card add
    public function aboutCardAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.about.card-add',compact('admins'));
    }

    // About card edit
    public function aboutCardEditPage($id) {
      $about = About::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.about.card-edit',compact('about','admins'));
    } 

    // About card team all
    public function aboutCardTeamAllPage() {
      $cardTeams = AboutCardTeam::all();
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-team-all',compact('cardTeams','admins'));
    }

    // About card team add 
    public function aboutCardTeamAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-team-add',compact('admins'));
    }

    // About card team edit
    public function aboutCardTeamEditPage($id) {
      $cardTeam = AboutCardTeam::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-team-edit',compact('cardTeam','admins'));
    }

    // About card offer all
    public function aboutCardOfferAllPage() {
      $cardOffers = AboutCardOffer::all();
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-offer-all',compact('cardOffers','admins'));
    }
    
    // About card offer add
    public function aboutCardOfferAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-offer-add',compact('admins'));
    }
    
    // About card offer edit
    public function aboutCardOfferEditPage($id) {
      $cardOffer = AboutCardOffer::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.about.cards.card-offer-edit',compact('cardOffer','admins'));
    }


    #-------------------------------------------------------------------------#
                            ##--- ADMIN CONTACT CARDS ---##
    #-------------------------------------------------------------------------#

    // Contact card all
    public function contactCardAllPage() {
      $contact = Contact::findOrFail(1);
      $admins = User::findOrFail(1);
      return view('admin.contact.contact-all-page',compact('contact','admins'));
    }

    // Contact card add
    public function contactCardAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.contact.contact-add-page',compact('admins'));
    }

    // Contact card edit
    public function contactCardEditPage($id) {
      $contact = Contact::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.contact.contact-edit-page',compact('contact','admins'));
    } 

    // Contact card faq all
    public function contactCardFaqAllPage() {
      $cardFaq = ContactCardFaq::findOrFail(1);
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-all',compact('cardFaq','admins'));
    }

    // Contact card faq add
    public function contactCardFaqAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-add',compact('admins'));
    }

    // Contact card faq edit
    public function contactCardFaqEditPage($id) {
      $cardFaq = ContactCardFaq::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-edit',compact('cardFaq','admins'));
    }

    // Contatc card faq data all
    public function contactCardFaqDataAllPage() {
      $cardFaqDatas = ContactCardFaqData::all();
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-data-all',compact('cardFaqDatas','admins'));
    }

    // Contact card faq data add
    public function contactCardFaqDataAddPage() {
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-data-add',compact('admins'));
    }

    // Contact card faq data edit
    public function contactCardFaqDataEditPage($id) {
      $cardFaqData = ContactCardFaqData::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.contact.cards.card-faq-data-edit',compact('cardFaqData','admins'));
    }

    // Contact Location map link edit
    public function contactLocationLink() {
      $contactLocation = ConatctLocation::findOrFail(1);
      $admins = User::findOrFail(1);
      return view('admin.contact.contact-location-link',compact('contactLocation','admins'));
    }

    // Contact Location map link edit
    public function contactLocationLinkEdit($id) {
      $contactLocation = ConatctLocation::findOrFail($id);
      $admins = User::findOrFail(1);
      return view('admin.contact.contact-location-link-edit',compact('contactLocation','admins'));
    }
}
  
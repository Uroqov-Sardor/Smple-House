<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// *********************************** SIMPLE PAGES ******************************* //
//---------------------------------------------------------------------------------//
                                    //*** HOME PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/', [PageController::class, 'homePage'])->name('home.page');


//---------------------------------------------------------------------------------//
                                    //*** ABOUT PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/about', [PageController::class, 'aboutPage'])->name('about.page');


//---------------------------------------------------------------------------------//
                                    //*** CONTACT PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact.page');


// ************************************ ADMIN ************************************ //
//---------------------------------------------------------------------------------//
                                    //*** LOGIN PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/login', [PageController::class, 'loginPage'])->name('login.page');

# Login post #
Route::post('login/check', [PostController::class, 'loginCheck'])->name('login.check');


//---------------------------------------------------------------------------------//
                                    //*** DASHMIN PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/admin/dashmin', [PageController::class, 'dashminPage'])->name('dashmin.page');


//---------------------------------------------------------------------------------//
                                    //*** ADMIN HOME ALL POST ***//
//---------------------------------------------------------------------------------//
Route::get('/admin/home/all/page', [PageController::class, 'homeAllPage'])->name('home.allpage');

# Home delete post
Route::get('/admin/home/delete/post/{id}', [PostController::class, 'homeDeletePost'])->name('home.deletepost');

# Home edit page
Route::get('/admin/home/edit/page/{id}', [PageController::class, 'homeEditPage'])->name('home.editpage');

# Home edit post
Route::post('/admin/home/edit/post', [PostController::class, 'homeEditPost'])->name('home.editpost');


//---------------------------------------------------------------------------------//
                                    //*** ADMIN HOME ADD POST ***//
//---------------------------------------------------------------------------------//
Route::get('/admin/home/add/page', [PageController::class, 'homeAddPage'])->name('home.addpage');

# Home add post #
Route::post('/admin/home/add/post', [PostController::class, 'homeAddPost'])->name('home.addpost');


//---------------------------------------------------------------------------------//
                                 //*** ADMIN HOME CARD IMAGES PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/admin/home/card/img/page', [PageController::class, 'homeCardImages'])->name('home.card.images');

# Home card image delete post #
Route::get('/admin/home/card/img/delete/post/{id}', [PostController::class, 'homeCardImgDelete'])->name('home.card.img.delete');

# Home card image edit page #
Route::get('/admin/home/card/img/edit/page/{id}', [PageController::class, 'homeCardImgEditPage'])->name('home.card.img.edit.page');

# Home card image edit post #
Route::post('/admin/home/card/img/edit/post', [PostController::class, 'homeCardEditPost'])->name('home.card.edit.post');


//---------------------------------------------------------------------------------//
                                 //*** ADMIN HOME CARD IMAGES ADD PAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/admin/home/card/img/add/page', [PageController::class, 'homeCardImageAdd'])->name('home.card.image.add');

# Home card image add post #
Route::post('/admin/home/card/img/add/post', [PostController::class, 'homeCardImageAddPost'])->name('home.card.image.add.post');


//---------------------------------------------------------------------------------//
                                 //*** ADMIN HOME CARDS ***//
//---------------------------------------------------------------------------------//

# Home card salad all page #
Route::get('/admin/home/card/salad/all/page', [PageController::class, 'homeCardSaladAllPage'])->name('home.card.salad.allpage');

# Home card salad add page #
Route::get('/admin/home/card/salad/add/page', [PageController::class, 'homeCardSaladAddPage'])->name('home.card.salad.addpage');

# Home card salad add post #
Route::post('/admin/home/card/salad/add/post', [PostController::class, 'homeCardSaladAddPost'])->name('home.card.salad.addpost');

# Home card salad delete post #
Route::get('/admin/home/card/salad/delete/post/{id}', [PostController::class, 'homeCardSaladDeletePost'])->name('home.card.salad.deletepost');

# Home card salad edit page #
Route::get('/admin/home/card/sald/edit/page/{id}', [PageController::class, 'homeCardSaladEditPage'])->name('home.card.salad.editpage');

# Home card salad edit post #
Route::post('/admin/home/card/salad/edit/post', [PostController::class, 'homeCardSaladEditPost'])->name('home.card.salad.editpost');

# Home card noodle all page #
Route::get('/admin/home/card/noodle/all/page', [PageController::class, 'homeCardNoodleAllPage'])->name('home.card.noodle.allpage');

# Home card noodle add page #
Route::get('/admin/home/card/noodle/add/page', [PageController::class, 'homeCardNoodleAddPage'])->name('home.card.noodle.addpage');

# Home card noodle add post #
Route::post('/admin/home/card/noodle/add/post', [PostController::class, 'homeCardNoodleAddPost'])->name('home.card.noodle.addpost');

# Home card noodle delete post #
Route::get('/admin/home/card/noodle/delete/post/{id}', [PostController::class, 'homeCardNoodleDeletePost'])->name('home.card.noodle.deletepost');

# Home card noodle edit page #
Route::get('/admin/home/card/noodle/edit/page/{id}', [PageController::class, 'homeCardNoodleEditPage'])->name('home.card.noodle.editpage');

# Home card noodle edit post #
Route::post('/admin/home/card/noodle/edit/post', [PostController::class, 'homeCardNoodleEditPost'])->name('home.card.noodle.editpost');


//---------------------------------------------------------------------------------//
                                 //*** ADMIN ABOUT CARDS ***//
//---------------------------------------------------------------------------------//

# About card all page # 
Route::get('/admin/about/card/all/page', [PageController::class, 'aboutCardAllPage'])->name('about.card.allpage');

# About card add page #
Route::get('/admin/about/card/add/page', [PageController::class, 'aboutCardAddPage'])->name('about.card.daapage');

# About card add post #
Route::post('/admin/about/card/add/post', [PostController::class, 'aboutCardAddPost'])->name('about.card.addpost');

# About card delete post #
Route::get('/admin/about/card/delete/post/{id}', [PostController::class, 'aboutCardDeletePost'])->name('about.card.deletepost');

# About card edit page #
Route::get('/admin/about/card/edit/page/{id}', [PageController::class, 'aboutCardEditPage'])->name('about.card.editpage');

# About card edit post #
Route::post('/admin/about/card/edit/post', [PostController::class, 'aboutCardEditPost'])->name('about.card.editpost');

# About card team all page #
Route::get('/admin/about/card/team/all/page', [PageController::class, 'aboutCardTeamAllPage'])->name('about.card.team.allpage');

# About card team add page #
Route::get('/admin/about/card/team/add/page', [PageController::class, 'aboutCardTeamAddPage'])->name('about.card.team.addpage');

# About card team add post #
Route::post('/admin/about/card/team/add/post', [PostController::class, 'aboutCardTeamAddPost'])->name('about.card.team.addpost');

# About card team delete post #
Route::get('/admin/about/card/team/delete/post/{id}', [PostController::class, 'aboutCardTeamDeletePost'])->name('about.card.team.deletepost');

# About card team edit page # 
Route::get('/admin/about/card/team/edit/page/{id}', [PageController::class, 'aboutCardTeamEditPage'])->name('about.card.team.editpage');

# About card team edit post #
Route::post('/admin/about/card/team/edit/post', [PostController::class, 'aboutCardTeamEditPost'])->name('about.card.team.editpost');

# About card offer all page #
Route::get('/admin/about/card/offer/all/page', [PageController::class, 'aboutCardOfferAllPage'])->name('about.card.offer.allpage');

# About card offer add page # 
Route::get('/admin/about/card/offer/add/page', [PageController::class, 'aboutCardOfferAddPage'])->name('about.card.offer.addpage');

# About card offer add post #
Route::post('/admin/about/card/offer/add/post', [PostController::class, 'aboutCardOfferAddPost'])->name('about.card.offer.addpost');

# About card offer delete post #
Route::get('/admin/about/card/offer/delete/post/{id}', [PostController::class, 'aboutCardOfferDeletePost'])->name('about.card.offer.deletepost');

# About card offer edit page #
Route::get('/admin/about/card/offer/edit/page/{id}', [PageController::class, 'aboutCardOfferEditPage'])->name('about.card.offer.editpage');

# About card offer edit post #
Route::post('/admin/about/card/offer/edit/post', [PostController::class, 'aboutCardOfferEditPost'])->name('about.card.offer.editpost');


//---------------------------------------------------------------------------------//
                                 //*** ADMIN CONTACT CARDS ***//
//---------------------------------------------------------------------------------//

# Contact card all page #
Route::get('/admin/contact/card/all/page', [PageController::class, 'contactCardAllPage'])->name('contact.card.allpage');

# Contact card add page #
Route::get('/admin/contact/card/add/page', [PageController::class, 'contactCardAddPage'])->name('contact.card.addpage');

# Contact card add post #
Route::post('/admin/contact/card/add/post', [PostController::class, 'contactCardAddPost'])->name('contact.card.addpost');

# Contact card delete post #
Route::get('/admin/contact/card/delete/post/{id}', [PostController::class, 'contactCardDeletePost'])->name('contact.card.deletepost');

# Contact card edit page #
Route::get('/admin/contact/card/edit/page/{id}', [PageController::class, 'contactCardEditPage'])->name('contact.card.editpage');

# Contact card edit post #
Route::post('/admin/contact/card/edit/post', [PostController::class, 'contactCardEditPost'])->name('contact.card.editpost');

# Contact card Faq all page #
Route::get('/admin/contact/card/faq/all/page', [PageController::class, 'contactCardFaqAllPage'])->name('contact.card.faq.allpage');

# Contact card Faq add page #
Route::get('/admin/contact/card/faq/add/page', [PageController::class, 'contactCardFaqAddPage'])->name('contact.card.faq.addpage');

# Contact card Faq add post #
Route::post('/admin/contact/card/faq/add/post', [PostController::class, 'contactCardFaqAddPost'])->name('contact.card.faq.addpost');

# Contact card Faq delete post #
Route::get('/admin/contact/card/faq/delete/post/{id}', [PostController::class, 'contactCardFaqDeletePost'])->name('contact.card.faq.deletepost');

# Contact card faq edit page #
Route::get('/admin/contact/card/faq/edit/page/{id}', [PageController::class, 'contactCardFaqEditPage'])->name('contact.card.faq.editpage');

# Contact card faq edit post #
Route::post('/admin/contact/card/faq/edit/post', [PostController::class, 'contactCardFaqEditPost'])->name('contact.card.faq.editpost');

# Contact card faq data all page #
Route::get('/admin/contact/card/faq/data/all/page', [PageController::class, 'contactCardFaqDataAllPage'])->name('contact.card.faq.data.allpage');

# Contact card faq data add page #
Route::get('/admin/contact/card/faq/data/add/page', [PageController::class, 'contactCardFaqDataAddPage'])->name('contact.card.faq.data.addpage');

# Contact card faq data add post #
Route::post('/admin/contact/card/faq/data/add/post', [PostController::class, 'contactCardFaqDataAddPost'])->name('contact.card.faq.data.addpost');

# Contact card faq data delete post #
Route::get('/admin/contact/card/faq/data/delete/post/{id}', [PostController::class, 'contactCardFaqDataDeletePost'])->name('contact.card.faq.data.deletepost');

# Contact card faq data edit page #
Route::get('/admin/contact/card/faq/data/edit/page/{id}', [PageController::class, 'contactCardFaqDataEditPage'])->name('contact.card.faq.data.editpage');

# Contact card faq data edit post #
Route::post('/admin/contact/card/faq/data/edit/post', [PostController::class, 'contactCardFaqDataEditPost'])->name('contact.card.faq.data.editpost');

# Contact Location Map Link page #
Route::get('/admin/contact/location/link', [PageController::class, 'contactLocationLink'])->name('contact.location.link.allpage');

# Contact Location Map Link edit page #
Route::get('/admin/contact/location/link/edit/page/{id}', [PageController::class, 'contactLocationLinkEdit'])->name('contact.location.link.editpage');

# Contact Location Map Link edit post #
Route::post('/admin/contact/location/link/edit/post', [PostController::class, 'contactLocationLinkEditPost'])->name('contact.location.link.editpost');

//---------------------------------------------------------------------------------//
                                 //*** SEDN MESSAGE EMAIL ***//
//---------------------------------------------------------------------------------//
Route::post('send/message', [EmailController::class, 'sendMessage'])->name('send.message');

//---------------------------------------------------------------------------------//
                                 //*** ADMIN LOGOUT DASHMIN ***//
//---------------------------------------------------------------------------------//

Route::get('/admin/dashmin/logout', function() {
  Auth::logout();
  return redirect('/');
})->name('logout');


//---------------------------------------------------------------------------------//
                                 //*** LANGUAGE ***//
//---------------------------------------------------------------------------------//
Route::get('/lang/{lang}', function($lang) {
  session(['lang'=>$lang]);

  return back();
});
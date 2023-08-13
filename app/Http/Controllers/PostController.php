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
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  #-------------------------------------------------------------------------#
  ##--- LOGIN CHECK ---##
  #-------------------------------------------------------------------------#
  public function loginCheck(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required|max:8'
    ]);

    $login = User::where([
      ['Email', $request['email']],
      ['Password', $request['password']]
    ])->first();

    if ($login) {
      Auth::login($login);

      return redirect()->route('home.allpage');
    } else {
      return redirect()->back()->with(['msg' => 'Email yoki Parol xato']);
    }
  }


  #-------------------------------------------------------------------------#
  ##--- HOME ADD ---##
  #-------------------------------------------------------------------------#
  public function homeAddPost(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'paragraph' => 'required|min:10',
      'paragraph_en' => 'required|min:10',
      'paragraph_ru' => 'required|min:10',
      'paragraph_uz' => 'required|min:10',
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $home = new Home();

    $home_cardImg = $request->file('cardImg');
    $new_home_cardImg = rand() . "_" . $home_cardImg->getClientOriginalName();
    $home_cardImg->move(public_path('temp/img'), $new_home_cardImg);


    $home->title = $request['title'];
    $home->title_en = $request['title_en'];
    $home->title_ru = $request['title_ru'];
    $home->title_uz = $request['title_uz'];
    $home->paragraph = $request['paragraph'];
    $home->paragraph_en = $request['paragraph_en'];
    $home->paragraph_ru = $request['paragraph_ru'];
    $home->paragraph_uz = $request['paragraph_uz'];
    $home->cardImg = $new_home_cardImg;
    $home->cardTitle = $request['cardTitle'];
    $home->cardTitle_en = $request['cardTitle_en'];
    $home->cardTitle_ru = $request['cardTitle_ru'];
    $home->cardTitle_uz = $request['cardTitle_uz'];
    $home->cardText = $request['cardText'];
    $home->cardText_en = $request['cardText_en'];
    $home->cardText_ru = $request['cardText_ru'];
    $home->cardText_uz = $request['cardText_uz'];

    if ($request->user()->homePosts()->save($home)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME DELETE ---##
  #-------------------------------------------------------------------------#
  public function homeDeletePost($id)
  {
    $home = Home::where('id', $id)->first();

    if (Auth::user()->id != $home->user_id) {
      return redirect()->back();
    }

    $home->delete();

    return redirect()->back()->with(['msg' => 'Deleted Post']);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME EDIT ---##
  #-------------------------------------------------------------------------#

  public function homeEditPost(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'paragraph' => 'required|min:10',
      'paragraph_en' => 'required|min:10',
      'paragraph_ru' => 'required|min:10',
      'paragraph_uz' => 'required|min:10',
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $home = Home::find($request['homeID']);

    if ($home->cardImg != "") {
      $home_cardImg = public_path() . '\temp\img\\' . $home->cardImg;
      unlink($home_cardImg);
    }

    $edit_cardImg = $request->file('cardImg');
    $edit_new_cardImg = rand() . "_" . $edit_cardImg->getClientOriginalName();
    $edit_cardImg->move(public_path('temp/img'), $edit_new_cardImg);

    $home->title = $request['title'];
    $home->title_en = $request['title_en'];
    $home->title_ru = $request['title_ru'];
    $home->title_uz = $request['title_uz'];
    $home->paragraph = $request['paragraph'];
    $home->paragraph_en = $request['paragraph_en'];
    $home->paragraph_ru = $request['paragraph_ru'];
    $home->paragraph_uz = $request['paragraph_uz'];
    $home->cardImg = $edit_new_cardImg;
    $home->cardTitle = $request['cardTitle'];
    $home->cardTitle_en = $request['cardTitle_en'];
    $home->cardTitle_ru = $request['cardTitle_ru'];
    $home->cardTitle_uz = $request['cardTitle_uz'];
    $home->cardText = $request['cardText'];
    $home->cardText_en = $request['cardText_en'];
    $home->cardText_ru = $request['cardText_ru'];
    $home->cardText_uz = $request['cardText_uz'];

    $home->update();

    return redirect()->back()->with(['msg' => 'Post Editd']);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME CARD IMAGE ADD ---##
  #-------------------------------------------------------------------------#

  public function homeCardImageAddPost(Request $request)
  {
    $request->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|min:2|max:10'
    ]);

    $homeCard = new HomeImgCards();

    $homeCard_Img = $request['cardImg'];
    $homeCard_new_Img = rand() . "_" . $homeCard_Img->getClientOriginalName();
    $homeCard_Img->move(public_path('temp/img'), $homeCard_new_Img);

    $homeCard->cardImg = $homeCard_new_Img;
    $homeCard->cardTitle = $request['cardTitle'];
    $homeCard->cardTitle_en = $request['cardTitle_en'];
    $homeCard->cardTitle_ru = $request['cardTitle_ru'];
    $homeCard->cardTitle_uz = $request['cardTitle_uz'];
    $homeCard->cardText = $request['cardText'];
    $homeCard->cardText_en = $request['cardText_en'];
    $homeCard->cardText_ru = $request['cardText_ru'];
    $homeCard->cardText_uz = $request['cardText_uz'];
    $homeCard->cardPrice = $request['cardPrice'];

    if ($request->user()->homeCardPosts()->save($homeCard)) {
      $msg = 'Post save successfull';
    } else {
      $msg = 'Post save Warning';
    }

    return redirect()->back()->with(['msg' => $msg]);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME CARD IMAGE DELETE ---##
  #-------------------------------------------------------------------------#
  public function homeCardImgDelete($id)
  {
    $homeCard = HomeImgCards::where('id', $id)->first();

    if (Auth::user()->id != $homeCard->user_id) {
      return redirect()->back();
    }

    $homeCard->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME CARD IMAGE EDIT ---##
  #-------------------------------------------------------------------------#
  public function homeCardEditPost(Request $request)
  {
    $request->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|min:2|max:10'
    ]);

    $homeCard = HomeImgCards::find($request['homeCardID']);

    if ($homeCard->cardImg != "") {
      $homeCard_Img = public_path() . '\temp\img\\' . $homeCard->cardImg;
      unlink($homeCard_Img);
    }

    $edit_cardImg = $request->file('cardImg');
    $edit_new_cardImg = rand() . "_" . $edit_cardImg->getClientOriginalName();
    $edit_cardImg->move(public_path('temp/img'), $edit_new_cardImg);

    $homeCard->cardImg = $edit_new_cardImg;
    $homeCard->cardTitle = $request['cardTitle'];
    $homeCard->cardTitle_en = $request['cardTitle_en'];
    $homeCard->cardTitle_ru = $request['cardTitle_ru'];
    $homeCard->cardTitle_uz = $request['cardTitle_uz'];
    $homeCard->cardText = $request['cardText'];
    $homeCard->cardText_en = $request['cardText_en'];
    $homeCard->cardText_ru = $request['cardText_ru'];
    $homeCard->cardText_uz = $request['cardText_uz'];
    $homeCard->cardPrice = $request['cardPrice'];

    $homeCard->update();

    return redirect()->back()->with(['msg' => 'Post Edited']);
  }


  #-------------------------------------------------------------------------#
  ##--- HOME CARDS ---##
  #-------------------------------------------------------------------------#
  // Home card salad add 
  public function homeCardSaladAddPost(Request $request)
  {
    $request->validate([
      'cardImg' => 'required|mimes:jpg|max:2024',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|max:10'
    ]);

    $cardSalad = new HomeCardSalad();

    $cardSaladImg = $request->file('cardImg');
    $cardSalad_newImg = rand() . "_" . $cardSaladImg->getClientOriginalName();
    $cardSaladImg->move(public_path('temp/img'), $cardSalad_newImg);

    $cardSalad->cardImg = $cardSalad_newImg;
    $cardSalad->cardTitle = $request['cardTitle'];
    $cardSalad->cardTitle_en = $request['cardTitle_en'];
    $cardSalad->cardTitle_ru = $request['cardTitle_ru'];
    $cardSalad->cardTitle_uz = $request['cardTitle_uz'];
    $cardSalad->cardText = $request['cardText'];
    $cardSalad->cardText_en = $request['cardText_en'];
    $cardSalad->cardText_ru = $request['cardText_ru'];
    $cardSalad->cardText_uz = $request['cardText_uz'];
    $cardSalad->cardPrice = $request['cardPrice'];

    if ($request->user()->homeCardSaladPosts()->save($cardSalad)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // Home card salsd delete
  public function homeCardSaladDeletePost($id)
  {
    $cardSalad = HomeCardSalad::where('id', $id)->first();

    if (Auth::user()->id != $cardSalad->user_id) {
      return redirect()->back();
    }

    $cardSalad->delete();

    return redirect()->back()->with(['msg' => 'Deleted Post']);
  }

  // Home card salad edit
  public function homeCardSaladEditPost(Request $request)
  {
    $request->validate([
      'cardImg' => 'required|mimes:jpg|max:2024',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|max:10'
    ]);

    $cardSalad = HomeCardSalad::find($request['cardSaladID']);

    if ($cardSalad->cardImg != "") {
      $cardSaladImg = public_path() . '\temp\img\\' . $cardSalad->cardImg;
      unlink($cardSaladImg);
    }

    $edit_cardSaladImg = $request->file('cardImg');
    $editNew_cardSaladImg = rand() . "_" . $edit_cardSaladImg->getClientOriginalName();
    $edit_cardSaladImg->move(public_path('temp/img'), $editNew_cardSaladImg);

    $cardSalad->cardImg = $editNew_cardSaladImg;
    $cardSalad->cardTitle = $request['cardTitle'];
    $cardSalad->cardTitle_en = $request['cardTitle_en'];
    $cardSalad->cardTitle_ru = $request['cardTitle_ru'];
    $cardSalad->cardTitle_uz = $request['cardTitle_uz'];
    $cardSalad->cardText = $request['cardText'];
    $cardSalad->cardText_en = $request['cardText_en'];
    $cardSalad->cardText_ru = $request['cardText_ru'];
    $cardSalad->cardText_uz = $request['cardText_uz'];
    $cardSalad->cardPrice = $request['cardPrice'];


    $cardSalad->update();

    return redirect()->back()->with(['msg' => 'Editing Post']);
  }

  // Home card noodle add
  public function homeCardNoodleAddPost(Request $request)
  {
    $request->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|max:10'
    ]);

    $cardNoodle = new HomeCardNoodle();

    $cardNoodleImg = $request->file('cardImg');
    $cardNoodle_newImg = rand() . "_" . $cardNoodleImg->getClientOriginalName();
    $cardNoodleImg->move(public_path('temp/img'), $cardNoodle_newImg);

    $cardNoodle->cardImg = $cardNoodle_newImg;
    $cardNoodle->cardTitle = $request['cardTitle'];
    $cardNoodle->cardTitle_en = $request['cardTitle_en'];
    $cardNoodle->cardTitle_ru = $request['cardTitle_ru'];
    $cardNoodle->cardTitle_uz = $request['cardTitle_uz'];
    $cardNoodle->cardText = $request['cardText'];
    $cardNoodle->cardText_en = $request['cardText_en'];
    $cardNoodle->cardText_ru = $request['cardText_ru'];
    $cardNoodle->cardText_uz = $request['cardText_uz'];
    $cardNoodle->cardPrice = $request['cardPrice'];

    if ($request->user()->homeCardNoodlePosts()->save($cardNoodle)) {
      $msg = "Post save successfully";
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // Home card noodle delete
  public function homeCardNoodleDeletePost($id)
  {
    $cardNoodle = HomeCardNoodle::where('id', $id)->first();

    if (Auth::user()->id != $cardNoodle->user_id) {
      return redirect()->back();
    }

    $cardNoodle->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // Home card noodle edit
  public function homeCardNoodleEditPost(Request $req)
  {
    $req->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardPrice' => 'required|max:10'
    ]);

    $cardNoodle = HomeCardNoodle::find($req['cardNoodleID']);

    if ($cardNoodle->cardImg != "") {
      $cardNoodleImg = public_path() . '\temp\img\\' . $cardNoodle->cardImg;

      unlink($cardNoodleImg);
    }

    $edit_cardNoodleImg = $req->file('cardImg');
    $edit_new_cardNoodleImg = rand() . "_" . $edit_cardNoodleImg->getClientOriginalName();
    $edit_cardNoodleImg->move(public_path('temp/img'), $edit_new_cardNoodleImg);

    $cardNoodle->cardImg = $edit_new_cardNoodleImg;
    $cardNoodle->cardTitle = $req['cardTitle'];
    $cardNoodle->cardTitle_en = $req['cardTitle_en'];
    $cardNoodle->cardTitle_ru = $req['cardTitle_ru'];
    $cardNoodle->cardText = $req['cardText'];
    $cardNoodle->cardText_en = $req['cardText_en'];
    $cardNoodle->cardText_ru = $req['cardText_ru'];
    $cardNoodle->cardPrice = $req['cardPrice'];

    $cardNoodle->update();

    return redirect()->back()->with(['msg' => 'Post Edited']);
  }


  #-------------------------------------------------------------------------#
  ##--- ABOUT CARDS ---##
  #-------------------------------------------------------------------------#

  // About card add
  public function aboutCardAddPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'paragraph' => 'required|min:10',
      'paragraph_en' => 'required|min:10',
      'paragraph_ru' => 'required|min:10',
      'paragraph_uz' => 'required|min:10',
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $about = new About();

    $aboutImg = $req->file('cardImg');
    $about_newImg = rand() . "_" . $aboutImg->getClientOriginalName();
    $aboutImg->move(public_path('temp/img'), $about_newImg);

    $about->title = $req['title'];
    $about->title_en = $req['title_en'];
    $about->title_ru = $req['title_ru'];
    $about->title_uz = $req['title_uz'];
    $about->paragraph = $req['paragraph'];
    $about->paragraph_en = $req['paragraph_en'];
    $about->paragraph_ru = $req['paragraph_ru'];
    $about->paragraph_uz = $req['paragraph_uz'];
    $about->cardImg = $about_newImg;
    $about->cardTitle = $req['cardTitle'];
    $about->cardTitle_en = $req['cardTitle_en'];
    $about->cardTitle_ru = $req['cardTitle_ru'];
    $about->cardTitle_uz = $req['cardTitle_uz'];
    $about->cardText = $req['cardText'];
    $about->cardText_en = $req['cardText_en'];
    $about->cardText_ru = $req['cardText_ru'];
    $about->cardText_uz = $req['cardText_uz'];

    if ($req->user()->aboutPosts()->save($about)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // About card delete
  public function aboutCardDeletePost($id)
  {
    $about = About::where('id', $id)->first();

    if (Auth::user()->id != $about->user_id) {
      return redirect()->back();
    }

    $about->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // About card edit
  public function aboutCardEditPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'paragraph' => 'required|min:10',
      'paragraph_en' => 'required|min:10',
      'paragraph_ru' => 'required|min:10',
      'paragraph_uz' => 'required|min:10',
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $about = About::find($req['aboutID']);

    if ($about->cardImg != "") {
      $aboutCard = public_path() . '\temp\img\\' . $about->cardImg;
      unlink($aboutCard);
    }

    $aboutImg = $req->file('cardImg');
    $new_aboutImg = rand() . "_" . $aboutImg->getClientOriginalName();
    $aboutImg->move(public_path('temp/img'), $new_aboutImg);

    $about->title = $req['title'];
    $about->title_en = $req['title_en'];
    $about->title_ru = $req['title_ru'];
    $about->title_uz = $req['title_uz'];
    $about->paragraph = $req['paragraph'];
    $about->paragraph_en = $req['paragraph_en'];
    $about->paragraph_ru = $req['paragraph_ru'];
    $about->paragraph_uz = $req['paragraph_uz'];
    $about->cardImg = $new_aboutImg;
    $about->cardTitle = $req['cardTitle'];
    $about->cardTitle_en = $req['cardTitle_en'];
    $about->cardTitle_ru = $req['cardTitle_ru'];
    $about->cardTitle_uz = $req['cardTitle_uz'];
    $about->cardText = $req['cardText'];
    $about->cardText_en = $req['cardText_en'];
    $about->cardText_ru = $req['cardText_ru'];
    $about->cardText_uz = $req['cardText_uz'];

    $about->update();

    return redirect()->back()->with(['msg' => 'Post Edited']);
  }

  // About card team add
  public function aboutCardTeamAddPost(Request $req)
  {
    $req->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardName' => 'required|max:255',
      'cardName_en' => 'required|max:255',
      'cardName_ru' => 'required|max:255',
      'cardName_uz' => 'required|max:255',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardInstagram' => 'required|max:255',
      'cardFacebook' => 'required|max:255'
    ]);

    $cardTeam = new AboutCardTeam();

    $cardTeamImg = $req->file('cardImg');
    $new_cardTeamImg = rand() . "_" . $cardTeamImg->getClientOriginalName();
    $cardTeamImg->move(public_path('temp/img'), $new_cardTeamImg);

    $cardTeam->cardImg = $new_cardTeamImg;
    $cardTeam->cardName = $req['cardName'];
    $cardTeam->cardName_en = $req['cardName_en'];
    $cardTeam->cardName_ru = $req['cardName_ru'];
    $cardTeam->cardName_uz = $req['cardName_uz'];
    $cardTeam->cardTitle = $req['cardTitle'];
    $cardTeam->cardTitle_en = $req['cardTitle_en'];
    $cardTeam->cardTitle_ru = $req['cardTitle_ru'];
    $cardTeam->cardTitle_uz = $req['cardTitle_uz'];
    $cardTeam->cardText = $req['cardText'];
    $cardTeam->cardText_en = $req['cardText_en'];
    $cardTeam->cardText_ru = $req['cardText_ru'];
    $cardTeam->cardText_uz = $req['cardText_uz'];
    $cardTeam->cardInstagram = $req['cardInstagram'];
    $cardTeam->cardFacebook = $req['cardFacebook'];

    if ($req->user()->aboutCardTeamPosts()->save($cardTeam)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // About card team delete 
  public function aboutCardTeamDeletePost($id)
  {
    $cardTeam = AboutCardTeam::where('id', $id)->first();

    if (Auth::user()->id != $cardTeam->user_id) {
      return redirect()->back();
    }

    $cardTeam->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // About card team edit
  public function aboutCardTeamEditPost(Request $req)
  {
    $req->validate([
      'cardImg' => 'required|mimes:jpg|max:2048',
      'cardName' => 'required|max:255',
      'cardName_en' => 'required|max:255',
      'cardName_ru' => 'required|max:255',
      'cardName_uz' => 'required|max:255',
      'cardTitle' => 'required|max:255',
      'cardTitle_en' => 'required|max:255',
      'cardTitle_ru' => 'required|max:255',
      'cardTitle_uz' => 'required|max:255',
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10',
      'cardInstagram' => 'required|max:255',
      'cardFacebook' => 'required|max:255'
    ]);

    $cardTeam = AboutCardTeam::find($req['cardTeamID']);

    if ($cardTeam->cardImg != "") {
      $cardTeamImg = public_path() . '\temp\img\\' . $cardTeam->cardImg;

      unlink($cardTeamImg);
    }

    $edit_cardTeamImg = $req->file('cardImg');
    $edit_new_cardTeamImg = rand() . "_" . $edit_cardTeamImg->getClientOriginalName();
    $edit_cardTeamImg->move(public_path('temp/img'), $edit_new_cardTeamImg);

    $cardTeam->cardImg = $edit_new_cardTeamImg;
    $cardTeam->cardName = $req['cardName'];
    $cardTeam->cardName_en = $req['cardName_en'];
    $cardTeam->cardName_ru = $req['cardName_ru'];
    $cardTeam->cardName_uz = $req['cardName_uz'];
    $cardTeam->cardTitle = $req['cardTitle'];
    $cardTeam->cardTitle_en = $req['cardTitle_en'];
    $cardTeam->cardTitle_ru = $req['cardTitle_ru'];
    $cardTeam->cardTitle_uz = $req['cardTitle_uz'];
    $cardTeam->cardText = $req['cardText'];
    $cardTeam->cardText_en = $req['cardText_en'];
    $cardTeam->cardText_ru = $req['cardText_ru'];
    $cardTeam->cardText_uz = $req['cardText_uz'];
    $cardTeam->cardInstagram = $req['cardInstagram'];
    $cardTeam->cardFacebook = $req['cardFacebook'];

    $cardTeam->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }

  // About card offer add
  public function aboutCardOfferAddPost(Request $req)
  {
    $req->validate([
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $cardOffer = new AboutCardOffer();


    $cardOffer->cardText = $req['cardText'];
    $cardOffer->cardText_en = $req['cardText_en'];
    $cardOffer->cardText_ru = $req['cardText_ru'];
    $cardOffer->cardText_uz = $req['cardText_uz'];

    if ($req->user()->aboutCardOfferPosts()->save($cardOffer)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // About card offer delete
  public function aboutCardOfferDeletePost($id)
  {
    $cardOffer = AboutCardOffer::where('id', $id)->first();

    if (Auth::user()->id != $cardOffer->user_id) {
      return redirect()->back();
    }

    $cardOffer->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // About card offer edit
  public function aboutCardOfferEditPost(Request $req)
  {
    $req->validate([
      'cardText' => 'required|min:10',
      'cardText_en' => 'required|min:10',
      'cardText_ru' => 'required|min:10',
      'cardText_uz' => 'required|min:10'
    ]);

    $cardOffer = AboutCardOffer::find($req['cardOfferID']);

    $cardOffer->cardText = $req['cardText'];
    $cardOffer->cardText_en = $req['cardText_en'];
    $cardOffer->cardText_ru = $req['cardText_ru'];
    $cardOffer->cardText_uz = $req['cardText_uz'];

    $cardOffer->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }


  #-------------------------------------------------------------------------#
  ##--- CONTACT CARDS ---##
  #-------------------------------------------------------------------------#

  // Contact card add
  public function contactCardAddPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10',
      'address' => 'required|max:255',
      'address_en' => 'required|max:255',
      'address_ru' => 'required|max:255',
      'address_uz' => 'required|max:255',
      'addressText' => 'required|max:255',
      'addressText_en' => 'required|max:255',
      'addressText_uz' => 'required|max:255',
      'addressText_ru' => 'required|max:255',
      'phone' => 'required|max:255',
      'email' => 'required|max:255',
      'fac' => 'required|max:255',
      'ins' => 'required|max:255'
    ]);

    $contact = new Contact();

    $contact->title = $req['title'];
    $contact->title_en = $req['title_en'];
    $contact->title_ru = $req['title_ru'];
    $contact->title_uz = $req['title_uz'];
    $contact->text = $req['text'];
    $contact->text_en = $req['text_en'];
    $contact->text_ru = $req['text_ru'];
    $contact->text_uz = $req['text_uz'];
    $contact->address = $req['address'];
    $contact->address_en = $req['address_en'];
    $contact->address_ru = $req['address_ru'];
    $contact->address_uz = $req['address_uz'];
    $contact->addressText = $req['addressText'];
    $contact->addressText_en = $req['addressText_en'];
    $contact->addressText_ru = $req['addressText_ru'];
    $contact->addressText_uz = $req['addressText_uz'];
    $contact->phone = $req['phone'];
    $contact->email = $req['email'];
    $contact->fac = $req['fac'];
    $contact->ins = $req['ins'];

    if ($req->user()->contactCardPosts()->save($contact)) {
      $msg = 'Post save successfully';
    } else {
      $msg = 'Post save Error';
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // Contact card delete
  public function contactCardDeletePost($id)
  {
    $contact = Contact::where('id', $id)->first();

    if (Auth::user()->id != $contact->user_id) {
      return redirect()->back();
    }

    $contact->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // Contact card edit
  public function contactCardEditPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10',
      'address' => 'required|max:255',
      'address_en' => 'required|max:255',
      'address_ru' => 'required|max:255',
      'address_uz' => 'required|max:255',
      'addressText' => 'required|max:255',
      'addressText_en' => 'required|max:255',
      'addressText_uz' => 'required|max:255',
      'addressText_ru' => 'required|max:255',
      'phone' => 'required|max:255',
      'email' => 'required|max:255',
      'fac' => 'required|max:255',
      'ins' => 'required|max:255'
    ]);

    $contact = Contact::find($req['contactCardID']);

    $contact->title = $req['title'];
    $contact->title_en = $req['title_en'];
    $contact->title_ru = $req['title_ru'];
    $contact->title_uz = $req['title_uz'];
    $contact->text = $req['text'];
    $contact->text_en = $req['text_en'];
    $contact->text_ru = $req['text_ru'];
    $contact->text_uz = $req['text_uz'];
    $contact->address = $req['address'];
    $contact->address_en = $req['address_en'];
    $contact->address_ru = $req['address_ru'];
    $contact->address_uz = $req['address_uz'];
    $contact->addressText = $req['addressText'];
    $contact->addressText_en = $req['addressText_en'];
    $contact->addressText_ru = $req['addressText_ru'];
    $contact->addressText_uz = $req['addressText_uz'];
    $contact->phone = $req['phone'];
    $contact->email = $req['email'];
    $contact->fac = $req['fac'];
    $contact->ins = $req['ins'];

    $contact->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }

  // Conatact card faq add
  public function contactCardFaqAddPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10'
    ]);

    $cardFaq = new ContactCardFaq();

    $cardFaq->title = $req['title'];
    $cardFaq->title_en = $req['title_en'];
    $cardFaq->title_ru = $req['title_ru'];
    $cardFaq->title_uz = $req['title_uz'];
    $cardFaq->text = $req['text'];
    $cardFaq->text_en = $req['text_en'];
    $cardFaq->text_ru = $req['text_ru'];
    $cardFaq->text_uz = $req['text_uz'];

    if ($req->user()->contactCardFaqPosts()->save($cardFaq)) {
      $msg = "Post save successfully";
    } else {
      $msg = "Post save Error";
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // Contact card faq delete
  public function contactCardFaqDeletePost($id)
  {
    $cardFaq = ContactCardFaq::where('id', $id)->first();

    if (Auth::user()->id != $cardFaq->user_id) {
      return redirect()->back();
    }

    $cardFaq->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // Contact card faq edit
  public function contactCardFaqEditPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10'
    ]);

    $cardFaq = ContactCardFaq::find($req['contactCardFaqID']);

    $cardFaq->title = $req['title'];
    $cardFaq->title_en = $req['title_en'];
    $cardFaq->title_ru = $req['title_ru'];
    $cardFaq->title_uz = $req['title_uz'];
    $cardFaq->text = $req['text'];
    $cardFaq->text_en = $req['text_en'];
    $cardFaq->text_ru = $req['text_ru'];
    $cardFaq->text_uz = $req['text_uz'];

    $cardFaq->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }

  // Contact card faq data add
  public function contactCardFaqDataAddPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10'
    ]);

    $cardFaqData = new ContactCardFaqData();

    $cardFaqData->title = $req['title'];
    $cardFaqData->title_en = $req['title_en'];
    $cardFaqData->title_ru = $req['title_ru'];
    $cardFaqData->title_uz = $req['title_uz'];
    $cardFaqData->text = $req['text'];
    $cardFaqData->text_en = $req['text_en'];
    $cardFaqData->text_ru = $req['text_ru'];
    $cardFaqData->text_uz = $req['text_uz'];

    if ($req->user()->contactCardFaqDataPosts()->save($cardFaqData)) {
      $msg = "Post save successfully";
    } else {
      $msg = "Post save Error";
    }

    return redirect()->back()->with([
      'msg' => $msg
    ]);
  }

  // Contact card faq data delete
  public function contactCardFaqDataDeletePost($id)
  {
    $cardFaqData = ContactCardFaqData::where('id', $id)->first();

    if (Auth::user()->id != $cardFaqData->user_id) {
      return redirect()->back();
    }

    $cardFaqData->delete();

    return redirect()->back()->with(['msg' => 'Post Deleted']);
  }

  // Contact card faq data edit
  public function contactCardFaqDataEditPost(Request $req)
  {
    $req->validate([
      'title' => 'required|max:255',
      'title_en' => 'required|max:255',
      'title_ru' => 'required|max:255',
      'title_uz' => 'required|max:255',
      'text' => 'required|min:10',
      'text_en' => 'required|min:10',
      'text_ru' => 'required|min:10',
      'text_uz' => 'required|min:10'
    ]);

    $cardFaqData = ContactCardFaqData::find($req['contactCardFaqDataID']);

    $cardFaqData->title = $req['title'];
    $cardFaqData->title_en = $req['title_en'];
    $cardFaqData->title_ru = $req['title_ru'];
    $cardFaqData->title_uz = $req['title_uz'];
    $cardFaqData->text = $req['text'];
    $cardFaqData->text_en = $req['text_en'];
    $cardFaqData->text_ru = $req['text_ru'];
    $cardFaqData->text_uz = $req['text_uz'];

    $cardFaqData->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }

  // Contact location map link edit
  public function contactLocationLinkEditPost(Request $req)
  {
    $req->validate([
      'locationLink' => 'required'
    ]);

    $contactLocation = ConatctLocation::find($req['contactLocationID']);

    $contactLocation->locationLink = $req['locationLink'];

    $contactLocation->update();

    return redirect()->back()->with(['msg' => 'Post Editeng']);
  }
}

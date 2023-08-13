@extends('admin.dashmin')
@section('nav')
<div class="navbar-nav w-100">
  <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-house me-2"></i>Home</a>
      <div class="dropdown-menu bg-transparent border-0">
          <a href="{{route('home.allpage')}}" class="dropdown-item">All Post</a>
          <a href="{{route('home.addpage')}}" class="dropdown-item">Add Post</a>
          <a href="{{route('home.card.images')}}" class="dropdown-item">Card Image All Post</a>
          <a href="{{route('home.card.image.add')}}" class="dropdown-item">Card Image Add Post</a>
          <a href="{{route('home.card.salad.allpage')}}" class="dropdown-item">Card Salad All Post</a>
          <a href="{{route('home.card.salad.addpage')}}" class="dropdown-item">Card Salad Add Post</a>
          <a href="{{route('home.card.noodle.allpage')}}" class="dropdown-item">Card Noodle All Post</a>
          <a href="{{route('home.card.noodle.addpage')}}" class="dropdown-item">Card Noodle Add Post</a>
      </div>
  </div>
  <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="bi bi-person-circle me-2"></i>About</a>
      <div class="dropdown-menu bg-transparent border-0">
          <a href="{{route('about.card.allpage')}}" class="dropdown-item">About Card All Post</a>
          <a href="{{route('about.card.daapage')}}" class="dropdown-item">About Card Add Post</a>
          <a href="{{route('about.card.team.allpage')}}" class="dropdown-item">Card Team All Post</a>
          <a href="{{route('about.card.team.addpage')}}" class="dropdown-item">Card Team Add Post</a>
          <a href="{{route('about.card.offer.allpage')}}" class="dropdown-item">Card Offer All Post</a>
          <a href="{{route('about.card.offer.addpage')}}" class="dropdown-item">Card Offer Add Post</a>
      </div>
  </div>
  <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-lines-fill me-2"></i>Contact</a>
      <div class="dropdown-menu bg-transparent border-0">
          <a href="{{route('contact.card.allpage')}}" class="dropdown-item">Contact Card All Post</a>
          <a href="{{route('contact.card.addpage')}}" class="dropdown-item">Contact Card Add Post</a>
          <a href="{{route('contact.card.faq.allpage')}}" class="dropdown-item">Card FAQ All Post</a>
          <a href="{{route('contact.card.faq.addpage')}}" class="dropdown-item">Card FAQ Add Post</a>
          <a href="{{route('contact.card.faq.data.allpage')}}" class="dropdown-item">Card FAQ Data All Post</a>
          <a href="{{route('contact.card.faq.data.addpage')}}" class="dropdown-item">Card FAQ Data Add Post</a>
          <a href="{{route('contact.location.link.allpage')}}" class="dropdown-item">Contact Location Map Link</a>
      </div>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
    <div class="bg-light rounded h-100 p-4">
      <form action="{{route('about.card.team.editpost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
        <h6 class="mb-4">Card Team Edit Post</h6>
        <div class="form-floating mb-3">
          <input name="cardImg" class="form-control mb-3" id="formFileSm" type="file">
          <label for="formFileSm" class="form-label">Card Image</label>
          @error('cardImg')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <img src="{{asset('temp/img/'.$cardTeam->cardImg)}}" alt="Image" width="400px" height="200px" class="img-fluid tm-gallery-img" />
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardName}}" name="cardName" type="text" class="form-control mb-3" id="floatingName"
                placeholder="Name">
            <label for="floatingName">Card Name</label>
            @error('cardName')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardName_en}}" name="cardName_en" type="text" class="form-control mb-3" id="floatingName"
                placeholder="Name">
            <label for="floatingName">Card Name EN</label>
            @error('cardName_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardName_ru}}" name="cardName_ru" type="text" class="form-control mb-3" id="floatingName"
                placeholder="Name">
            <label for="floatingName">Card Name RU</label>
            @error('cardName_ru')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardName_uz}}" name="cardName_uz" type="text" class="form-control mb-3" id="floatingName"
                placeholder="Name">
            <label for="floatingName">Card Name UZ</label>
            @error('cardName_uz')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardTitle}}" name="cardTitle" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Card Title</label>
            @error('cardTitle')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardTitle_en}}" name="cardTitle_en" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Card Title EN</label>
            @error('cardTitle_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardTitle_ru}}" name="cardTitle_ru" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Card Title RU</label>
            @error('cardTitle_ru')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$cardTeam->cardTitle_uz}}" name="cardTitle_uz" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Card Title UZ</label>
            @error('cardTitle_uz')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Card Text</p>
          <textarea name="cardText" class="form-control mb-3" placeholder="Card Image"
              id="floatingTextarea" style="height: 150px;">{{$cardTeam->cardText}}</textarea>
              @error('cardText')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Card Text EN</p>
          <textarea name="cardText_en" class="form-control mb-3" placeholder="Card Image"
              id="floatingTextarea" style="height: 150px;">{{$cardTeam->cardText_en}}</textarea>
              @error('cardText_en')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Card Text RU</p>
          <textarea name="cardText_ru" class="form-control mb-3" placeholder="Card Image"
              id="floatingTextarea" style="height: 150px;">{{$cardTeam->cardText_ru}}</textarea>
              @error('cardText_ru')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Card Text UZ</p>
          <textarea name="cardText_uz" class="form-control mb-3" placeholder="Card Image"
              id="floatingTextarea" style="height: 150px;">{{$cardTeam->cardText_uz}}</textarea>
              @error('cardText_uz')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
        <div class="form-floating mb-3">
          <input value="{{$cardTeam->cardInstagram}}" name="cardInstagram" type="text" class="form-control mb-3" id="floatingInstagram"
              placeholder="Instagram">
          <label for="floatingInstagram">Card Instagram</label>
          @error('cardInstagram')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input value="{{$cardTeam->cardFacebook}}" name="cardFacebook" type="text" class="form-control mb-3" id="floatingFacebook"
              placeholder="Facebook">
          <label for="floatingFacebook">Card Facebook</label>
          @error('cardFacebook')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <input value="{{$cardTeam->id}}" type="hidden" name="cardTeamID">
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i></button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'cardText' );
  CKEDITOR.replace( 'cardText_en' );
  CKEDITOR.replace( 'cardText_ru' );
  CKEDITOR.replace( 'cardText_uz' );
</script>
@endsection
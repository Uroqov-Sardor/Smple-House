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
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-person-circle me-2"></i>About</a>
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
      <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="bi bi-person-lines-fill me-2"></i>Contact</a>
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
      <form action="{{route('contact.card.faq.addpost')}}" method="POST">
        @csrf
        @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
        <h6 class="mb-4">Card FAQ Add Post</h6>
        <div class="form-floating mb-3">
            <input name="title" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title</label>
            @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input name="title_en" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title EN</label>
            @error('title_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input name="title_ru" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title RU</label>
            @error('title_ru')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input name="title_uz" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title UZ</label>
            @error('title_uz')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Text</p>
            <textarea name="text" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;"></textarea>
            @error('text')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Text EN</p>
            <textarea name="text_en" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;"></textarea>
            @error('text_en')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Text RU</p>
            <textarea name="text_ru" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;"></textarea>
            @error('text_ru')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
          <p>Text UZ</p>
            <textarea name="text_uz" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;"></textarea>
            @error('text_uz')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i></button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'text' );
  CKEDITOR.replace( 'text_en' );
  CKEDITOR.replace( 'text_ru' );
  CKEDITOR.replace( 'text_uz' );
</script>
@endsection
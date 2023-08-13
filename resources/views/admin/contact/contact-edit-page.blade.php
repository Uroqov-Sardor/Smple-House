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
      <form action="{{route('contact.card.editpost')}}" method="POST">
        @csrf
        @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
        <h6 class="mb-4">Contact Card Edit Post</h6>
        <div class="form-floating mb-3">
            <input value="{{$contact->title}}" name="title" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title</label>
            @error('title')
                <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->title_en}}" name="title_en" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title EN</label>
            @error('title_en')
                <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->title_ru}}" name="title_ru" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title RU</label>
            @error('title_ru')
                <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->title_uz}}" name="title_uz" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Title UZ</label>
            @error('title_uz')
                <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Text</p>
            <textarea name="text" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;">{{$contact->text}}</textarea>
            @error('text')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Text EN</p>
            <textarea name="text_en" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;">{{$contact->text_en}}</textarea>
            @error('text_en')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Text RU</p>
            <textarea name="text_ru" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;">{{$contact->text_ru}}</textarea>
            @error('text_ru')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Text UZ</p>
            <textarea name="text_uz" class="form-control mb-3" placeholder="text"
                id="floatingTextarea" style="height: 150px;">{{$contact->text_uz}}</textarea>
            @error('text_uz')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->address}}" name="address" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Address</label>
            @error('address')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->address_en}}" name="address_en" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Address EN</label>
            @error('address_en')
              <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->address_ru}}" name="address_ru" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Address RU</label>
          @error('address_ru')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->address_uz}}" name="address_uz" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Address UZ</label>
          @error('address_uz')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Address Text</p>
          <textarea name="addressText" class="form-control mb-3" placeholder="Card Image"
          id="floatingTextarea" style="height: 150px;">{{$contact->addressText}}</textarea>
          @error('addressText')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Address Text EN</p>
          <textarea name="addressText_en" class="form-control mb-3" placeholder="Card Image"
          id="floatingTextarea" style="height: 150px;">{{$contact->addressText_en}}</textarea>
          @error('addressText_en')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Address Text RU</p>
          <textarea name="addressText_ru" class="form-control mb-3" placeholder="Card Image"
          id="floatingTextarea" style="height: 150px;">{{$contact->addressText_ru}}</textarea>
          @error('addressText_ru')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <p>Address Text UZ</p>
          <textarea name="addressText_uz" class="form-control mb-3" placeholder="Card Image"
          id="floatingTextarea" style="height: 150px;">{{$contact->addressText_uz}}</textarea>
          @error('addressText_uz')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->phone}}" name="phone" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Phone Number</label>
          @error('phone')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->email}}" name="email" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Email</label>
          @error('email')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->fac}}" name="fac" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Facebook</label>
          @error('fac')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <input value="{{$contact->ins}}" name="ins" type="text" class="form-control mb-3" id="floatingTitle"
                placeholder="Title">
            <label for="floatingTitle">Instagaram</label>
          @error('ins')
            <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
        <input value="{{$contact->id}}" type="hidden" name="contactCardID">
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
  CKEDITOR.replace( 'addressText' );
  CKEDITOR.replace( 'addressText_en' );
  CKEDITOR.replace( 'addressText_ru' );
  CKEDITOR.replace( 'addressText_uz' );
</script>
@endsection
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
        @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
        <h6 class="mb-4">About Card All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Paragraph</th>
                    <th scope="col">Card Image</th>
                    <th scope="col">Card Title</th>
                    <th scope="col">Card Text</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>{{$about->title}}</td>
                    <td>{!!$about->paragraph!!}</td>
                    <td>{{$about->cardImg}}</td>
                    <td>{{$about->cardTitle}}</td>
                    <td>{!!$about->cardText!!}</td>
                    <td>
                      <a href="{{route('about.card.editpage',['id'=>$about->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.deletepost',['id'=>$about->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">About Card Title All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title EN</th>
                    <th scope="col">Title RU</th>
                    <th scope="col">Title UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>{{$about->title_en}}</td>
                    <td>{{$about->title_ru}}</td>
                    <td>{{$about->title_uz}}</td>
                    <td>
                      <a href="{{route('about.card.editpage',['id'=>$about->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.deletepost',['id'=>$about->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">About Card Paragraph All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Paragraph EN</th>
                    <th scope="col">Paragraph RU</th>
                    <th scope="col">Paragraph UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>{!!$about->paragraph_en!!}</td>
                    <td>{!!$about->paragraph_ru!!}</td>
                    <td>{!!$about->paragraph_uz!!}</td>
                    <td>
                      <a href="{{route('about.card.editpage',['id'=>$about->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.deletepost',['id'=>$about->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">About Card TitleCT All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Card Title EN</th>
                    <th scope="col">Card Title RU</th>
                    <th scope="col">Card Title UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>{{$about->cardTitle_en}}</td>
                    <td>{{$about->cardTitle_ru}}</td>
                    <td>{{$about->cardTitle_uz}}</td>
                    <td>
                      <a href="{{route('about.card.editpage',['id'=>$about->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.deletepost',['id'=>$about->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">About Card TextCT All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Card Text EN</th>
                    <th scope="col">Card Text RU</th>
                    <th scope="col">Card Text UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$about->id}}</th>
                    <td>{!!$about->cardText_en!!}</td>
                    <td>{!!$about->cardText_ru!!}</td>
                    <td>{!!$about->cardText_uz!!}</td>
                    <td>
                      <a href="{{route('about.card.editpage',['id'=>$about->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.deletepost',['id'=>$about->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
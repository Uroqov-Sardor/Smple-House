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
        @if(Session::has('msg'))
        <div class="alert alert-success">
          {{Session::get('msg')}}
        </div>
        @endif
        <h6 class="mb-4">Contact Card All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Text</th>
                    <th scope="col">Address</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->title}}</td>
                    <td>{!!$contact->text!!}</td>
                    <td>{{$contact->address}}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">Contact Card All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address Text</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Facebook</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{!!$contact->addressText!!}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->fac}}</td>
                    <td>{{$contact->ins}}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">Contact Card TitleCT All Post</h6>
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
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->title_en}}</td>
                    <td>{{$contact->title_ru}}</td>
                    <td>{{$contact->title_uz}}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">Contact Card TextCT All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Text EN</th>
                    <th scope="col">Text RU</th>
                    <th scope="col">Text UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{!!$contact->text_en!!}</td>
                    <td>{!!$contact->text_ru!!}</td>
                    <td>{!!$contact->text_uz!!}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">Contact Card Address All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address EN</th>
                    <th scope="col">Address RU</th>
                    <th scope="col">Address UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->address_en}}</td>
                    <td>{{$contact->address_ru}}</td>
                    <td>{{$contact->address_uz}}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h6 class="mb-4">Contact Card Address Text All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address Text EN</th>
                    <th scope="col">Address Text RU</th>
                    <th scope="col">Address Text UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{!!$contact->addressText_en!!}</td>
                    <td>{!!$contact->addressText_ru!!}</td>
                    <td>{!!$contact->addressText_uz!!}</td>
                    <td>
                      <a href="{{route('contact.card.editpage',['id'=>$contact->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('contact.card.deletepost',['id'=>$contact->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
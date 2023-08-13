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
        <h6 class="mb-4">Card Offer All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Card Text</th>
                    <th scope="col">Card Text EN</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($cardOffers as $cardOffer)
                <tr>
                    <th scope="row">{{$cardOffer->id}}</th>
                    <td>{!!$cardOffer->cardText!!}</td>
                    <td>{!!$cardOffer->cardText_en!!}</td>
                    <td>
                      <a href="{{route('about.card.offer.editpage',['id'=>$cardOffer->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.offer.deletepost',['id'=>$cardOffer->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h6 class="mb-4">Card Offer TextCT RU All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Card Text RU</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($cardOffers as $cardOffer)
                <tr>
                    <th scope="row">{{$cardOffer->id}}</th>
                    <td>{!!$cardOffer->cardText_ru!!}</td>
                    <td>
                      <a href="{{route('about.card.offer.editpage',['id'=>$cardOffer->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.offer.deletepost',['id'=>$cardOffer->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h6 class="mb-4">Card Offer TextCT UZ All Post</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Card Text UZ</th>
                    <th scope="col" colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($cardOffers as $cardOffer)
                <tr>
                    <th scope="row">{{$cardOffer->id}}</th>
                    <td>{!!$cardOffer->cardText_uz!!}</td>
                    <td>
                      <a href="{{route('about.card.offer.editpage',['id'=>$cardOffer->id])}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td>
                      <a href="{{route('about.card.offer.deletepost',['id'=>$cardOffer->id])}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
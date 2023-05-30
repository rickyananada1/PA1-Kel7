@extends('layouts.front')

@section('title')
Welcome to TOBA AGRO
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
  <div class="container">
    <div class="row pb-5 mb-4">
      <h2>All Product</h2>
      @foreach($featured_category as $prod)
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <!-- Card-->
        <div class="card rounded shadow-sm border-0">
          <div class="card-body p-4">
            <a href="{{url('category/'.$prod->slug.'/'.$prod->slug)}}">
              <img src="{{asset('assets/uploads/category/'.$prod->image)}}" alt="" class="img-fluid d-block mx-auto mb-3">
            </a>
            <h5> <a href="{{url('category/'.$prod->slug.'/'.$prod->slug)}}" class="text-dark">{{$prod->name}}</a></h5>
            <p class="small text-muted font-italic">{{$prod->description}}</p>
            <p class="small text-muted font-italic fw-bold">Rp {{$prod->selling_price}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
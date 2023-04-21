@extends('layouts.front')

@section('title')
Welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Product</h2>
            @foreach($featured_category as $prod)
            <div class="col-md-3 mt-3">
                <div class="card">
                    <a href="{{url('category/'.$prod->slug.'/'.$prod->slug)}}">
                        <img class="img-fluid" src="{{asset('assets/uploads/category/'.$prod->image)}}" alt="Ini Product">
                    </a>
                    <div class="card-body">
                        <h5>{{$prod->name}}</h5>
                        <p>{{$prod->description}}</p>
                        <small>{{$prod->selling_price}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
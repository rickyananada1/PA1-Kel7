@extends('layouts.front')

@section('title',$category->name)

@section('content')

<div class=".py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">{{$category->name}}</h4>
    </div>
</div>


<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $category->name }}
                    </h2>

                    <hr>
                    <label for="" class="me-3">Selling Price : Rp {{$category->selling_price}}</label>
                    <p class="mt-3">
                        {!! $category->description !!}
                    </p>
                    <hr>
                    @if($category->qty > 0)
                    <label for="" class="badge bg-success">In Stock</label>
                    @else
                    <label for="" class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$category->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity " class="form-control qty-input text-center" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            @if($category->qty > 0)
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
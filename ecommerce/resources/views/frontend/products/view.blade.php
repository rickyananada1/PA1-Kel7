@extends('layouts.front')

@section('title', $category->name)

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/add-rating')}}" method="POST">
                @csrf
                <input type="hidden" name="category_id" value="{{$category->id}}" />
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$category->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                            @for($i = 1; $i<=$user_rating->stars_rated; $i++)
                                <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for($j=$user_rating->stars_rated+1; $j <=5; $j++) <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                    @endfor
                                    @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                    @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <label for="" class="fw-bold">Selling Price: Rp {{$category->selling_price}}</label>
                    @php $ratenum = number_format($rating_value) @endphp
                    <div class="rating">
                        @for($i = 1; $i<=$ratenum; $i++) <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j = $ratenum+1; $j <=5; $j++) <i class="fa fa-star"></i>
                                @endfor
                                <span>
                                    @if($ratings->count() > 0)
                                    {{$ratings->count()}} Ratings
                                    @else
                                    No Ratings
                                    @endif
                                </span>
                    </div>
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
                        <div class="col-md-4">
                            <input type="hidden" value="{{$category->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="1" max="99999">
                                <button class="input-group-text increment-btn">+</button>
                                <h4 style="display: inline-block; margin-left: 5px;" class="fw-bold">kg</h4>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            @if($category->qty > 0)
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Rate this product
                            </button>
                            <?php
                            $user_rating = App\Models\Rating::where('prod_id', $category->id)->where('user_id', Auth::id())->first();
                            ?>
                            @if($user_rating)
                            <a href="{{url('add-review/'.$category->slug.'/userreview')}}" class="btn btn-primary">
                                Write a review
                            </a>
                            @endif
                        </div>
                        <div class="row py-3">
                            <div class="col-md-8">
                                @foreach($reviews as $item)
                                <div class="user-review">
                                    <label for="">{{$item->user->name.' '.$item->user->lname}}</label>
                                    @if($item->user_id == Auth::id())
                                    <a href="{{url('edit-review/'.$category->slug.'/userreview' )}}">edit</a>
                                    @endif
                                    @php

                                    $rating = App\Models\Rating::where('prod_id',$category->id)->where('user_id',$item->user->id)->first();

                                    @endphp
                                    @if($rating)
                                    @php $user_rated = $rating->stars_rated @endphp
                                    @for($i = 1; $i<=$user_rated; $i++) <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for($j = $user_rated+1; $j <=5; $j++) <i class="fa fa-star"></i>
                                            @endfor
                                            <small>Reviewed on {{$item->created_at->format('d M Y')}}</small>
                                            <p>
                                                {{ $item->user_review }}
                                            </p>
                                            @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
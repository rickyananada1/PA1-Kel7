@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')

<div class=".py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">
            <a href="{{url('cart')}}" class="text-decoration-none text-dark">
                Cart
            </a>
        </h4>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach($cartitems as $item)
            <div class="row">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('assets/uploads/category/'.$item->category->image)}}" height="70px" width="auto" alt="Ini Gambar">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{$item->category->name}}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>Rp {{$item->category->selling_price}}</h6>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->Category->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:138px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity " class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->category->selling_price*$item->prod_qty; @endphp
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : Rp {{ $total }}
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to checkout</a>
            </h6>

        </div>
    </div>
</div>

@endsection
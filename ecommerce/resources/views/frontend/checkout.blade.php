@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')
<div class=".py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h4 class="mb-0">
            <a href="{{url('checkout')}}" class="text-decoration-none text-dark">
                Checkout
            </a>
        </h4>
    </div>
</div>

<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->address }}" name="address" placeholder="Enter Address" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if($cartitems->count()>0)
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($cartitems as $item)
                                @php $total += $item->category->selling_price*$item->prod_qty; @endphp
                                <tr>
                                    <td> {{ $item->category->name }}</td>
                                    <td> {{ $item->prod_qty}}</td>
                                    <td>Rp {{ $item->category->selling_price }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="px-2">Grand Total: <span class="float-end">Rp {{ $total }} </span></h4>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <h2>No products in cart</i></h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
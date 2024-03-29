@extends('layouts.admin')

@section('title')
My Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Orders View
                        <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border">{{$order->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{$order->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{$order->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border">{{$order->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border">
                                {{$order->address}},
                                {{$order->city}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Orders Details</h4>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($order->orderitems as $item)
                                    @php
                                    $price = $item->categories->selling_price;
                                    $qty = $item->qty;
                                    $subtotal = $price * $qty;
                                    $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $item->categories->name }}</td>
                                        <td>{{ $qty }}</td>
                                        <td>{{ $price }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/category/'.$item->categories->image) }}" width="50px" alt="Product Image">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end">Rp {{ $total }}</span></h4>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
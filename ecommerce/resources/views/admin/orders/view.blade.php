@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Orders View
                        <a href="{{url('orders')}}" class="btn btn-warning text-black float-end">Back</a>
                    </h4>
                </div>
                <div class=" card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border">{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{$orders->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border">
                                {{$orders->address}},
                                {{$orders->city}}
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
                                    @foreach($orders->orderitems as $item)
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

                            <div class="mt-5 px-2">
                                <label for="">Order Status</label>
                                <form action="{{  url('update-order/'.$orders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">
                                        <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                                        <option {{ $orders->status == '1'? 'selected':'' }} value="1">Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
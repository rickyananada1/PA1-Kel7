@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Products Pages</h4>
        <hr>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="Image here" class="cate-image">
                    </td>
                    <td>
                        <a href="{{('edit-prod/'.$item->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
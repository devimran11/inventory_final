@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/update_product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Code</label>
                    <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control">
                </div>
                <div class="form-group">
                    @php
                        $cat = DB::table('categories')->get();
                    @endphp
                    <label for="exampleInputPassword2">Category Name</label>
                    <select name="cat_id" class="form-control">
                        <option>---Select Category Name---</option>
                        @foreach($cat as $row)
                            <option value="{{$row->id}}" <?php if($product->cat_id == $row->id) {echo "selected";} ?> >{{$row->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @php
                        $sup = DB::table('suppliers')->get();
                    @endphp
                    <label for="exampleInputPassword2">Supplier Name</label>
                    <select name="sup_id" class="form-control">
                        <option>----Select Supplier Name----</option>
                        @foreach($sup as $row)
                            <option value="{{$row->id}}"<?php if($product->sup_id == $row->id){echo "selected";}?> >{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Product Garage</label>
                    <input type="text" name="product_garage" value="{{$product->product_garage}}" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Product Route</label>
                    <input type="text" name="product_route" value="{{$product->product_route}}" class="form-control" id="exampleInputPassword3">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">Buy Date</label>
                    <input type="date" name="buy_date" value="{{$product->buy_date}}" class="form-control" id="exampleInputPassword5">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword6">Expire Date</label>
                    <input type="date" name="expire_date" value="{{$product->expire_date}}" class="form-control" id="exampleInputPassword6">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword7">Buying Rate</label>
                    <input type="number" name="buying_rate" value="{{$product->buying_rate}}" class="form-control" id="exampleInputPassword7">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword8">Selling Rate</label>
                    <input type="number" name="selling_rate" value="{{$product->selling_rate}}" class="form-control" id="exampleInputPassword8">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Product Image</label>
                    <input type="file" name="product_image" class="form-control" id="exampleInputPassword4">
                    <img src="{{url($product->product_image)}}" height="50" width="50">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

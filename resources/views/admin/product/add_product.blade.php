@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <a href="{{url('/import_product/')}}" class="btn btn-success btn-sm" style="float: right">Import Product</a>
        <div class="well">
            <form action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Code</label>
                    <input type="text" name="product_code" class="form-control">
                </div>
                <div class="form-group">
                    @php
                        $cat = DB::table('categories')->get();
                    @endphp
                    <label for="exampleInputPassword2">Category Name</label>
                    <select name="cat_id" class="form-control">
                        <option>---Select Category Name---</option>
                        @foreach($cat as $row)
                            <option value="{{$row->id}}">{{$row->category_name}}</option>
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
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Product Garage</label>
                    <input type="text" name="product_garage" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Product Route</label>
                    <input type="text" name="product_route" class="form-control" id="exampleInputPassword3">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">Buy Date</label>
                    <input type="date" name="buy_date" class="form-control" id="exampleInputPassword5">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword6">Expire Date</label>
                    <input type="date" name="expire_date" class="form-control" id="exampleInputPassword6">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword7">Buying Rate</label>
                    <input type="number" name="buying_rate" class="form-control" id="exampleInputPassword7">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword8">Selling Rate</label>
                    <input type="number" name="selling_rate" class="form-control" id="exampleInputPassword8">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Product Image</label>
                    <input type="file" name="product_image" class="form-control" id="exampleInputPassword4">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

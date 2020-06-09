@extends('admin.master')
@section('title')
    All Product Here
@endsection
@section('content')
{{--    <form action="{{url('/search')}}" method="get">--}}
{{--        <input type="search" name="search">--}}
{{--        <button type="submit" name="submit" class="btn btn-primary">search</button>--}}
{{--    </form>--}}
    <div class="container">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Code</th>
                <th scope="col">Selling Rate</th>
                <th scope="col">image</th>
                <th scope="col">Garage</th>
                <th scope="col">Route</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {{$i = 1}}
            @foreach($products as $product)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$product->product_name}}</td>
                <td>{{$product->product_code}}</td>
                <td>{{$product->selling_rate}}</td>
                <td><img src="{{url($product->product_image)}}" height="50" width="50"></td>
                <td>{{$product->product_garage}}</td>
                <td>{{$product->product_route}}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ url('/view_product/'.$product->id) }}">
                        <i class="fas fa-street-view" ></i>
                    </a>
                    <a class="btn btn-info btn-sm" href="{{url('/edit_product/'.$product->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="{{ url('/delete_product/'.$product->id) }}" onclick="return confirm('Are you sure delete this!')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

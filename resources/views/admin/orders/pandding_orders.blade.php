@extends('admin.master')
@section('title')
    Pandding Order
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
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Payment</th>
                <th scope="col">Order Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($panddings as $pandding)
                <tr>
                    <td>{{$pandding->name}}</td>
                    <td>{{$pandding->order_date}}</td>
                    <td>{{$pandding->total_product}}</td>
                    <td>{{$pandding->total}}</td>
                    <td>{{$pandding->pay}}</td>
                    <td><span class="badge badge-danger">{{$pandding->order_status}}</span></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{url('/order_status/'.$pandding->id)}}">
                            <i class="fas fa-street-view" ></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

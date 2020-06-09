@extends('admin.master')
@section('title')
    Confirm Order
@endsection
@section('content')
    {{--    <form action="{{url('/search')}}" method="get">--}}
    {{--        <input type="search" name="search">--}}
    {{--        <button type="submit" name="submit" class="btn btn-primary">search</button>--}}
    {{--    </form>--}}
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Payment</th>
                <th scope="col">Order Status</th>
            </tr>
            </thead>
            {{$i = 1}}
            <tbody>
            @foreach($confirmed as $confirm)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$confirm->name}}</td>
                    <td>{{$confirm->order_date}}</td>
                    <td>{{$confirm->total_product}}</td>
                    <td>{{$confirm->total}}</td>
                    <td>{{$confirm->pay}}</td>
                    <td><span class="badge badge-danger">{{$confirm->order_status}}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

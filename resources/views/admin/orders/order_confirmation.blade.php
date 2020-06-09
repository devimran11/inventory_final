@extends('admin.master')
@section('title')
    Order Confirmation
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="text-success -align-center" style="float: left">Order Confirmation</h2>
            </div>
            <div class="col-sm-4">
                <h4 class="text-bold -align-center">Sopno<span> Panthopath, Dhaka-1212</span></h4>
            </div>
            <div class="col-sm-4">
                <h2 class="text-success -align-center" style="float: right">Invoice</h2>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="left-profile">
                    <img src="{{url($orders->photo)}}" height="80" width="80">
                    <div class="content" style="padding-bottom: 0px">
                        Name: {{$orders->name}}<br>
                        Shop Name: {{$orders->shop_name}}<br>
                        Address: {{$orders->address}}City: {{$orders->city}}<br>
                        Phone: {{$orders->phone}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="invoice" style="float: right">
                    <h5 class="text-dark">Order Date: {{$orders->order_date}}</h5><br>
                    <p class="text-danger -align-center">Order Status: <span class="btn btn-danger btn-sm btn-">Panding</span></p>
                    <p class="text-info -align-center">Order ID: {{$orders->id}}</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit cost</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordersdetails as $ordersdetail)
                    <tr>
                        <td>{{$ordersdetail->product_name}}</td>
                        <td>{{$ordersdetail->product_code}}</td>
                        <td>{{$ordersdetail->quantity}}</td>
                        <td>{{$ordersdetail->unitcost}}</td>
                        <td>{{$ordersdetail->unitcost*$ordersdetail->quantity}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total" style="float: right">
            <td>Sub Total: {{$orders->sub_total}}</td><br>
            <td>Vat: {{$orders->vat}}</td><br>
            <hr>
            <h5>Total + Vat: {{$orders->total}}</h5><hr>
            <a href="#" onclick="window.print()" class="btn btn-danger btn-sm text-white"><i class="fa fa-print" aria-hidden="true"></i></a>
            <a href="{{url('/pos_done/'.$orders->id)}}"><button  type="submit" name="submit" class="btn btn-primary btn-sm">Done</button></a>
        </div>
    </div>
@endsection

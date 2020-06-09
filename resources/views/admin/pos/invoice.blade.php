@extends('admin.master')
@section('title')
    Invoice
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h2 class="text-success -align-center" style="float: left">Inventory</h2>
            </div>
            <div class="col-sm-4">
                <h4 class="text-bold -align-center">{{$customer->shop_name}},<span> Panthopath, Dhaka-1212</span></h4>
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
                    <img src="{{url($customer->photo)}}" height="80" width="80">
                    <div class="content" style="padding-bottom: 0px">
                        Name: {{$customer->name}}<br>
                        Shop Name: {{$customer->shop_name}}<br>
                        Address: {{$customer->address}}City: {{$customer->city}}<br>
                        Phone: {{$customer->phone}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="invoice" style="float: right">
                    <h5 class="text-dark">Order Date: {{date('d/m/Y')}}</h5><br>
                    <p class="text-danger -align-center">Order Status: <span class="btn btn-danger btn-sm btn-">Panding</span></p>
                    <p class="text-info -align-center">Order ID: #5252</p>
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
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Single Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                @php
                $i = 1;
                @endphp
                <tbody>
                    @foreach($contents as $con)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$con->name}}</td>
                        <td>{{$con->qty}}</td>
                        <td>{{$con->price}}</td>
                        <td>{{$con->price*$con->qty}}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total" style="float: right">
            <td>Sub Total: {{Cart::subtotal()}}</td><br>
            <td>Vat: {{Cart::tax()}}</td><br>
            <hr>
            <h5>Total + Vat: {{Cart::total()}}</h5><hr>
            <a href="#" onclick="window.print()" class="btn btn-danger btn-sm text-white"><i class="fa fa-print" aria-hidden="true"></i></a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Submit
            </button>
            <form action="{{url('/final_invoice')}}" method="post">
                @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><span class="text-align-center text-danger">Invoice Of: {{$customer->name}}, Total: {{Cart::total()}}</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="container">
                                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                <input type="hidden" name="order_date" value="{{date('d/m/Y')}}">
                                <input type="hidden" name="order_status" value="panding">
                                <input type="hidden" name="total_product" value="{{ Cart::count() }}">
                                <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                <input type="hidden" name="total" value="{{ Cart::total() }}">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="payment_status" class="form-control">
                                                <option value="hand_cash">Hand cash</option>
                                                <option value="card">Card</option>
                                                <option value="due">Due</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="pay" class="form-control" placeholder="Pay......">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="due" class="form-control" placeholder="Due......">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>


        <!-- Modal -->

    </div>
@endsection

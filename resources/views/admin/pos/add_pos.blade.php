@extends('admin.master')
@section('title')
    Add POS
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6"  style="padding-top: 22px">

                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Single Price</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @php
                        $cart_product = Cart::content();
                    @endphp
                    <tbody>
                    @foreach($cart_product as $prod)
                        <tr>
                            <td>{{$prod->name}}</td>
                            <td>
                                <form action="{{('/cart_update/'.$prod->rowId)}}" method="post">
                                    @csrf
                                    <input type="number" name="qty" value="{{$prod->qty}}" style="width: 30px">
                                    <button type="submit" name="submit" class="btn btn-success btn-sm" style="margin-top: -5px">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{$prod->price}}</td>
                            <td>{{$prod->price*$prod->qty}}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{url('/cart_remove/'.$prod->rowId)}}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="widget">
                    <div class="card" style="">
                        <div class="card-body" style="">
                            <h5 class="card-title text-info">  Total Product: {{Cart::count()}}</h5>
                            <h5 class="card-title text-danger">Sub Total: {{Cart::subtotal()}}</h5>
                            <h5 class="card-title text-dark">  VAT: {{Cart::tax()}}</h5>
                        </div>
                    </div>
                    <h4 class="font text-center">Total: </h4>
                    <div class="card" style="">
                        <div class="card-body" style="text-align: center">
                            <h5 class="card-title text-success">Total Amount: {{Cart::total()}}</h5>
                        </div>
                    </div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Customer Name</th>
                                <th scope="col"><a class="btn btn-info btn-sm" href="{{url('/add_customer')}}">Add</a></th>
                            </tr>
                            </thead>
                            <tbody>
                                <form action="{{url('/invoice/')}}" method="post">
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
                                    <tr>
                                        <td>
                                            <select name="cus_id" class="form-control">
                                                <option disabled="" selected="">----Select Customer Name----</option>
                                                @foreach($customers as $cus)
                                                    <option value="{{$cus->id}}">{{$cus->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><button name="submit" class="btn btn-primary form-control">Create Invoice</button></td>
                                    </tr>

                                </form>
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pro Name</th>
                        <th scope="col">Cat Name</th>
                        <th scope="col">Pro Code</th>
                        <th scope="col">Add POS</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$i = 1}}
                    @foreach($products as $product)
                        <form action="{{url('/cart')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->product_name}}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="price" value="{{$product->buying_rate}}">
                            <input type="hidden" name="weight" value="{{$product->weight}}">
                        <tr>
                            <th>{{$i++}}</th>
                            <td>
                                <img src="{{url($product->product_image)}}" height="50" width="50">
                            </td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->product_code}}</td>
                            <td><button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>
                        </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

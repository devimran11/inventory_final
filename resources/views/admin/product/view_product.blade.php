@extends('admin.master')
@section('title')
    Employee Here
@endsection
@section('content')
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-profile">
                        <img src="{{URL::to($product->product_image)}}" height="350" width="350">
                        <div class="content">
                            <h2 contenteditable="true"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="Details">
                        <h4>Presonal information</h4>
                        <p><span style="font-weight: 900;">Category Name: </span>{{$product->category_name}}</p>
                        <p><span style="font-weight: 900;">Product Name: </span>{{$product->product_name}}</p>
                        <p><span style="font-weight: 900;">Product Code: </span>{{$product->product_code}}</p>
                        <p><span style="font-weight: 900;">Product Garage: </span>{{$product->product_garage}}</p>
                        <p><span style="font-weight: 900;">Product Route: </span>{{$product->product_route}}</p>
                        <p><span style="font-weight: 900;">Selling Rate: </span>{{$product->selling_rate}}</p>
                        <p><span style="font-weight: 900;">Buying Rate: </span>{{$product->buying_rate}}</p>
                        <p><span style="font-weight: 900;">Expire Date: </span>{{$product->expire_date}}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@extends('admin.master')
@section('title')
    Customer Here
@endsection
@section('content')
    <div class="container">
{{--        <nav class="navbar navbar-default">--}}
{{--            <div class="container-fluid">--}}
{{--                <!-- Collect the nav links, forms, and other content for toggling -->--}}
{{--                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
{{--                    <ul class="nav navbar-nav">--}}
{{--                        <li class="active"><a href="">Admission Students <span class="sr-only">(current)</span></a></li>--}}
{{--                        <li class=""><a href="">Payments Status</a></li>--}}
{{--                        <li class=""><a href="">Result Status </a></li>--}}
{{--                    </ul>--}}
{{--                </div><!-- /.navbar-collapse -->--}}
{{--            </div><!-- /.container-fluid -->--}}
{{--        </nav>--}}
    </div>
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-profile">
                        <img src="{{URL::to($id->photo)}}" height="410" width="400">
                        <div class="content">
                            <h2 contenteditable="true"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="Details">
                        <h4>Presonal information</h4>
                        <p><span style="font-weight: 900;">Name: </span>{{$id->name}}</p>
                        <p><span style="font-weight: 900;">Email: </span>{{$id->email}}</p>
                        <p><span style="font-weight: 900;">phone: </span>{{$id->phone}}</p>
                        <p><span style="font-weight: 900;">Address: </span>{{$id->address}}</p>
                        <p><span style="font-weight: 900;">Shop Name: </span>{{$id->shop_name}}</p>
                        <p><span style="font-weight: 900;">Account Holder: </span>{{$id->account_holder}}</p>
                        <p><span style="font-weight: 900;">Account Number: </span>{{$id->account_number}}</p>
                        <p><span style="font-weight: 900;">Bank Name: </span>{{$id->bank_name}}</p>
                        <p><span style="font-weight: 900;">Bank Branch: </span>{{$id->bank_branch}}</p>
                        <p><span style="font-weight: 900;">City: </span>{{$id->city}}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

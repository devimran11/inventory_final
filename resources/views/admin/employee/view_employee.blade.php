@extends('admin.master')
@section('title')
    Employee Here
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
                        <img src="{{URL::to($id->photo)}}" height="380" width="380">
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
                        <p><span style="font-weight: 900;">Experience: </span>{{$id->experience}}</p>
                        <p><span style="font-weight: 900;">Salary: </span>{{$id->salary}}</p>
                        <p><span style="font-weight: 900;">Vacation: </span>{{$id->vacation}}</p>
                        <p><span style="font-weight: 900;">City: </span>{{$id->city}}</p>
                        <p><span style="font-weight: 900;">NID No.: </span>{{$id->nid_no}}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

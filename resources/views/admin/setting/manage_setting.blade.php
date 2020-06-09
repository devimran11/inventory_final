@extends('admin.master')
@section('title')
    All Settings Here
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Logo</th>
                <th scope="col">Mobile</th>
                <th scope="col">City</th>
{{--                <th scope="col">Company Country</th>--}}
                <th scope="col">ZipCode</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {{$i = 1}}
            @foreach($settings as $setting)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$setting->company_name}}</td>
                <td>{{$setting->company_address}}</td>
                <td>{{$setting->company_email}}</td>
                <td>{{$setting->company_phone}}</td>
                <td><img src="{{url($setting->company_logo)}}" height="50" width="50"></td>
                <td>{{$setting->company_mobile}}</td>
                <td>{{$setting->company_city}}</td>
{{--                <td>{{$setting->company_country}}</td>--}}
                <td>{{$setting->company_zipcode}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{url('/edit_setting/'.$setting->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="{{url('/update_setting/'.$setting->id)}}" onclick="return confirm('Are you sure delete this!')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

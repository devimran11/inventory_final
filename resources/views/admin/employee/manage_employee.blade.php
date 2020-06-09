@extends('admin.master')
@section('title')
    All Employee Here
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
{{--                <th scope="col">Email</th>--}}
                <th scope="col">Phone</th>
                <th scope="col">Experience</th>
                <th scope="col">Salary</th>
                <th scope="col">Vacation</th>
                <th scope="col">City</th>
{{--                <th scope="col">NID No.</th>--}}
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {{$i = 1}}
            @foreach($employees as $employee)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$employee->name}}</td>
{{--                <td>{{$employee->email}}</td>--}}
                <td>{{$employee->phone}}</td>
                <td>{{$employee->experience}}</td>
                <td>{{$employee->salary}}</td>
                <td>{{$employee->vacation}}</td>
                <td>{{$employee->city}}</td>
{{--                <td>{{$employee->nid_no}}</td>--}}
                <td><img src="{{$employee->photo}}" height="50" width="50px"></td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ url('/view_employee/'.$employee->id) }}">
                        <i class="fas fa-street-view" ></i>
                    </a>
                    <a class="btn btn-info btn-sm" href="{{ (url('/edit_employee/'.$employee->id)) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="{{ url('/delete_employee/'.$employee->id) }}" onclick="return confirm('Are you sure delete this!')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

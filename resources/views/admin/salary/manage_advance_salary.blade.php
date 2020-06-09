@extends('admin.master')
@section('title')
    All Advance Salary Here
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Month</th>
                <th scope="col">Salary</th>
                <th scope="col">Advance Salary</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $salaries as $salary)
            <tr>
                <th>{{$salary->id}}</th>
                <td>{{$salary->name}}</td>
                <td><img src="{{url($salary->photo)}}" height="50" width="50px"></td>
                <td>{{$salary->month}}</td>
                <td>{{$salary->salary}}</td>
                @php
                $total = $salary->salary - $salary->advance_salary;
                @endphp
                <td>{{$salary->advance_salary}}</td>
                <td>{{$total}}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="">
                        <i class="fas fa-street-view" ></i>
                    </a>
                    <a class="btn btn-info btn-sm" href="">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="" onclick="return confirm('Are you sure delete this!')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

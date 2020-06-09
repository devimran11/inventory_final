@extends('admin.master')
@section('title')
    All Manage Here
@endsection
@section('content')
    <div class="container">
        <!-- Trigger the modal with a button -->
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/add_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add
            </button>
        </a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/today_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
                Today
            </button>
        </a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/this_month_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                This Month
            </button>
        </a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/year_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                This Year
            </button>
        </a>

        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Details</th>
                <th scope="col">Amount</th>
                <th scope="col">Month</th>
                <th scope="col">Day</th>
                <th scope="col">Year</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {{$i = 1}}
            @foreach($expenses as $row)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$row->details}}</td>
                    <td>{{$row->amount}}</td>
                    <td>{{$row->month}}</td>
                    <td>{{$row->date}}</td>
                    <td>{{$row->year}}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{url('/edit_expenses/'.$row->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

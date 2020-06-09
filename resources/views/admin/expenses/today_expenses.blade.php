@extends('admin.master')
@section('title')
    Today Expenses
@endsection
@section('content')
    <div class="container">
            <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/add_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add
            </button>
        </a></a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/this_month_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                This Month
            </button>
        </a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/add_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                This Year
            </button>
        </a>
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/manage_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                Manage Expenses
            </button>
        </a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Details</th>
                <th scope="col">Amount</th>
                <th scope="col">Month</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
                 $date = date('d/m/Y');
                 $today = DB::table('expenses')->where('date', $date)->get();
                 $today_expense = DB::table('expenses')->where('date', $date)->sum('amount');
            @endphp
            @foreach($today as $row)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$row->details}}</td>
                    <td>{{$row->amount}}</td>
                    <td>{{$row->month}}</td>

                </tr>
            @endforeach
            </tbody>

        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $today_expense }}</span>
        </h3>
    </div>

@endsection

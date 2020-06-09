@extends('admin.master')
@section('title')
    This Month Expenses
@endsection
@section('content')
    <div class="container">
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/january_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                January
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/february_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
                February
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/march_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                March
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/april_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                April
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/may_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                may
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/june_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
                June
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/july_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                July
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/august_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                August
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/september_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                September
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/october_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
                October
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/november_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                November
            </button>
        </a>
        <a class="" style="float: left; color: black;padding-right: 10px" href="{{url('/december_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                December
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
            @endphp
            @foreach($expenses as $row)
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
            <span style="float: right;">{{$amount}} tk</span>
        </h3>
    </div>

@endsection

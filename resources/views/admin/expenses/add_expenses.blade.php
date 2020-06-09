@extends('admin.master')
@section('title')
    Add Expenses
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
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
        <a class="" style="float: right; color: black;padding-right: 10px" href="{{url('/manage_expenses')}}">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                Manage Expenses
            </button>
        </a>
        <div class="well">
            <form action="{{url('/save_expenses')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Details</label>
                    <textarea name="details" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="text" name="amount" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <input type="hidden" name="month" value="{{date('F')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="date" value="{{date('d/m/Y')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="year" value="{{date('Y')}}" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

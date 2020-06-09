@extends('admin.master')
@section('title')
    Edit Expenses
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/update_expenses/'.$edit_expenses->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Details</label>
                    <textarea name="details" class="form-control" rows="5">{{$edit_expenses->details}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="text" name="amount" value="{{$edit_expenses->amount}}" class="form-control" id="exampleInputPassword1">
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
                <button type="submit" name="submit" class="btn btn-primary form-control">Update</button>
            </form>
        </div>
    </div>
@endsection

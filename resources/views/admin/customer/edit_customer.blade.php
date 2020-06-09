@extends('admin.master')
@section('title')
    Edit Employee
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/update_customer/'.$id->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$id->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$id->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$id->phone}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea name="address" class="form-control" cols="" rows="5">{{$id->address}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" name="shop_name" class="form-control" value="{{$id->shop_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Holder</label>
                    <input type="text" name="account_holder" class="form-control" value="{{$id->account_holder}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Number</label>
                    <input type="text" name="account_number" class="form-control" value="{{$id->account_number}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" value="{{$id->bank_name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bank Branch</label>
                    <input type="text" name="bank_branch" class="form-control" value="{{$id->bank_branch}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" name="city" class="form-control" value="{{$id->city}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputPassword1">
                    <img src="{{URL::to($id->photo)}}" height="50" width="50">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

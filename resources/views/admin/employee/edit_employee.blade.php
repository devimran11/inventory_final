@extends('admin.master')
@section('title')
    Edit Employee
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/update_employee/'.$id->id)}}" method="post" enctype="multipart/form-data">
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
                    <label for="exampleInputPassword1">Experience</label>
                    <input type="text" name="experience" class="form-control" value="{{$id->experience}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="text" name="salary" class="form-control" value="{{$id->salary}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Vacation</label>
                    <input type="text" name="vacation" class="form-control" value="{{$id->vacation}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" name="city" class="form-control" value="{{$id->city}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NID NO.</label>
                    <input type="text" name="nid_no" class="form-control" value="{{$id->nid_no}}">
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

@extends('admin.master')
@section('title')
    Product Import
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <a href="{{url('/export/')}}" class="btn btn-success btn-sm" style="float: right">download xlsx</a>
            <form action="{{url('/import/')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword2">Xlsx File Upload Import</label>
                    <input type="file" name="import_product">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
@endsection

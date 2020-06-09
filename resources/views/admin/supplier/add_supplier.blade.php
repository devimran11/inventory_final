@extends('admin.master')
@section('title')
    Add Supplier
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/save_supplier')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea name="address" class="form-control" cols="" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">type</label>
                    <select name="type" class="form-control">
                        <option value="">-----------Select Option-----------</option>
                        <option value="distributor">Distributor</option>
                        <option value="whole_seller">Whole Seller</option>
                        <option value="brochure">Brochure</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" name="shop" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Holder</label>
                    <input type="text" name="account_holder" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Account Number</label>
                    <input type="text" name="account_number" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bank name</label>
                    <input type="text" name="bank_name" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Branch Name</label>
                    <input type="text" name="branch_name" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" name="city" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

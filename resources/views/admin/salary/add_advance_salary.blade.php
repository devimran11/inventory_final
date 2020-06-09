@extends('admin.master')
@section('title')
    Add Advance Salary
@endsection
@section('content')
    <div class="container col-sm-8 col-sm-offset-2">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{url('/save_advance_salary')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @php
                      $emp = DB::table('employees')->get();
                    @endphp
                    <label for="exampleInputEmail1">Employer Name</label>
                    <select name="emp_id" class="form-control">
                        <option>-----Select Name Here----</option>
                        @foreach($emp as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Month</label>
                    <select name="month" class="form-control">
                        <option>-----Select Month Here----</option>
                        <option value="january">January</option>
                        <option value="february">February</option>
                        <option value="march">March</option>
                        <option value="april">April</option>
                        <option value="may">May</option>
                        <option value="june">June</option>
                        <option value="july">July</option>
                        <option value="august">August</option>
                        <option value="september">September</option>
                        <option value="october">October</option>
                        <option value="november">November</option>
                        <option value="december">December</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input type="number" name="year" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Advance Money</label>
                    <input type="number" name="advance_salary" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

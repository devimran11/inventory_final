@extends('admin.master')
@section('title')
    Attendance Here
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center text-success">Today: {{date('d/m/Y')}}</h3>
        <h1 class="text-center text-danger">{{Session::get('message')}}</h1>
        <a class="btn btn-dark" href="{{url('take_attendance')}}">Attendance</a>
        <a class="btn btn-info" href="{{url('all_attendance')}}">All Att</a>
        <form action="{{url('save_attendance')}}" method="post">
            @csrf
            <table class="table" id="datatable">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Attendance</th>
                </tr>
                </thead>
                    <tbody>
                    {{$i = 1}}
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$employee->name}}</td>
                            <td><img src="{{$employee->photo}}" height="50" width="50"></td>
                            <input type="hidden" name="user_id[]" value="{{$employee->id}}">
                            <td>
                                <input type="radio" name="attendance[{{$employee->id}}]" value="Present" required>Present
                                <input type="radio" name="attendance[{{$employee->id}}]" value="Absent" required>Absent
                            </td>
                            <input type="hidden" name="att_date" value="{{date('d/m/Y')}}">
                            <input type="hidden" name="att_year" value="{{date('Y')}}">
                            <input type="hidden" name="month" value="{{date('F')}}">
                        </tr>
                    @endforeach
                    </tbody>

            </table>
            <button type="submit" class="btn btn-success">Take Attendance</button>
        </form>
    </div>

@endsection

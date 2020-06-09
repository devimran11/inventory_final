@extends('admin.master')
@section('title')
    All Attendance
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
                    <th scope="col">Edit Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                {{$i = 1}}
                @foreach($all_att as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->edit_date}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{url('/edit_attendance/'.$row->edit_date)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <button type="submit" class="btn btn-success">Take Attendance</button>
        </form>
    </div>

@endsection

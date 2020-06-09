@extends('admin.master')
@section('title')
    Edit Attendance Here
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center text-danger">Update Attendances: {{$edit_data->att_date}}</h1>
        <a class="btn btn-dark" href="{{url('take_attendance')}}">Attendance</a>
        <a class="btn btn-info" href="{{url('all_attendance')}}">All Att</a>
        <form action="{{url('/update_attendance')}}" method="post">
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
                    @foreach($edit_dates as $edit_date)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$edit_date->name}}</td>
                            <td><img src="{{url($edit_date->photo)}}" height="50" width="50"></td>

                            <td>
                                <input type="hidden" name="id[]" value="{{$edit_date->id}}">
                                <input type="radio" name="attendance[{{$edit_date->id}}]" value="Present" required=""<?php if($edit_date->attendance =='Present'){
                                    echo 'checked';
                                }?>>Present
                                <input type="radio" name="attendance[{{$edit_date->id}}]" value="Absent" required=""<?php if($edit_date->attendance =='Absent'){
                                    echo 'checked';
                                }?>>Absent
                                <input type="hidden" name="att_date" value="{{date('d/m/Y')}}">
                                <input type="hidden" name="att_year" value="{{date('Y')}}">
                                <input type="hidden" name="month" value="{{date('F')}}">
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

            </table>
            <button type="submit" class="btn btn-success">Update Attendance</button>
        </form>
    </div>

@endsection

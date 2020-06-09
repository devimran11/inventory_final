@extends('admin.master')
@section('title')
    All Category Lit Here
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            {{$i = 1}}
            @foreach($category as $row)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$row->category_name}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ (url('/edit_category/'.$row->id)) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="{{ url('/delete_category/'.$row->id) }}" onclick="return confirm('Are you sure delete this!')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@extends('layout.mainlayout')
@section('title', 'Teacher')

@section('content')
    <h1>This is Teacher</h1>
    <h3>Teacher List</h3>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>            
            @foreach($teacherList as $data)
            <tr>
                <td>{{$loop->iteration}} </td>
                <td>{{$data->name}} </td>
                <td><a href="teacher/{{$data->id}}">Detail</a></td>
            </tr>
            @endforeach            
        </tbody>
    </table>
    
@endsection
@extends('layout.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>This is Student</h1>
    <h3>Student List</h3>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>NIS</th>
            <th>Class ID</th>
            <th>Class Name</th>
            <th>Ekskul</th>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    <td>{{$data->class_id}}</td>
                    <td>{{$data->class['name']}}</td>
                    <td>
                        @foreach($data->ekskul as $eks)
                            - {{$eks->name}} <br>
                        @endforeach
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
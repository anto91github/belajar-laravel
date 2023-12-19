@extends('layout.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>This is Student</h1>
    <h3>Student List</h3>

    <div class="my-5">
        <a href="student-add" class="btn btn-primary">Add Data</a>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>NIS</th>
            {{-- <th>Class ID</th> --}}
            {{-- <th>Class Name</th>
            <th>Ekskul</th>
            <th>HomeRoom Teacher</th> --}}
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    {{-- <td>{{$data->class_id}}</td> --}}
                    {{-- <td>{{$data->class['name']}}</td>
                    <td>
                        @foreach($data->ekskul as $eks)
                            - {{$eks->name}} <br>
                        @endforeach
                    </td>
                    <td>{{$data->class->homeRoomTeacher->name}}</td> --}}
                    <td>
                        <a href="student/{{$data->id}}">Detail</a>
                        |
                        <a href="student-edit/{{$data->id}}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
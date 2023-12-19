@extends('layout.mainlayout')
@section('title', 'Class')

@section('content')
    <h1>This is Class</h1>
    <h3>Class List</h3>

    <div class="my-5">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                {{-- <th>Student Name</th>
                <th>Homeroom Teacher</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                {{-- <td>
                @foreach($data->student as $s)
                    {{$s->name}}
                    @if( !$loop->last)
                    ,
                    @endif
                @endforeach
                </td>
                <td>
                    {{$data->homeRoomTeacher->name}}
                </td> --}}

                <td><a href="class/{{$data->id}}">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
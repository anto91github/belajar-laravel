@extends('layout.mainlayout')
@section('title', 'Students')

@section('content')
    <h3>Deleted Student</h3>
    <a href="/students" class="btn btn-primary">Back</a>
    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>NIS</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($deleted as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    <td>
                        <a href="/student/{{$data->id}}/restore">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
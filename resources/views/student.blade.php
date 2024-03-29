@extends('layout.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>This is Student</h1>
    <h3>Student List</h3>

    <div class="my-5 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>

    @if (Session::has('status'))
        @if (Session::get('status') == 'success')
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        
    @endif

    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="pencarian" id="floatingInputGroup1" placeholder="Keyword">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>NIS</th>
            {{-- <th>Class ID</th> --}}
            <th>Class Name</th>
            {{-- <th>Ekskul</th>
            <th>HomeRoom Teacher</th> --}}
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    {{-- <td>{{$loop->iteration}}</td> --}}
                    <td>{{ $studentList->firstItem() + $loop->index }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    {{-- <td>{{$data->class_id}}</td> --}}
                    <td>{{$data->class['name']}}</td>
                    {{-- <td>
                        @foreach($data->ekskul as $eks)
                            - {{$eks->name}} <br>
                        @endforeach
                    </td> --}}
                    {{-- <td>{{$data->class->homeRoomTeacher->name}}</td> --}}
                    <td>
                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            <a href="student/{{$data->slug}}">Detail</a>
                            |
                            <a href="student-edit/{{$data->id}}">Edit</a>
                        @else
                            -
                        @endif
                           
                        @if(Auth::user()->role_id == 1)
                            |
                            <a href="student-delete/{{$data->id}}">Delete</a>
                        @endif
                       
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class='my-3'>
        {{$studentList->withQueryString()->links()}}
    </div>
    
    <x-alert messages='halaman student' type='success'/>
@endsection
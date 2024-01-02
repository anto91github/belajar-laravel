@extends('layout.mainlayout')
@section('title', 'Students')

@section('content')
    <h2>Student Detail</h2>
    {{-- {{$student}} --}}
    <h3>Data Siswa : </h3>
    <div class='my-3 d-flex justify-content-center'>
        @if($student->image !='')
            <img src="{{asset('storage/studentsPhoto/'.$student->image)}}" width="200px">
        @else
            <img src="{{asset('images/anonymus.jpg')}}" width="200px">
        @endif
    </div>
    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>HomeRoom teacher</th>
            <th>Ekskul</th>
        </tr>
        <tr>
            <td>{{$student->name}}</td>
            <td>
                @if ($student->gender == 'P')
                    Perempuan
                @else
                    Laki-Laki
                @endif
            </td>
            <td>{{$student->class->name}} </td>
            <td>{{$student->class->homeRoomTeacher->name}} </td>
            <td>
                @foreach($student->ekskul as $eks)
                    - {{$eks->name}} <br/>
                @endforeach
            </td>
        </tr>
    </table>   
    
    <style>
        th {
            width:20%;
        }
    </style>
    
@endsection
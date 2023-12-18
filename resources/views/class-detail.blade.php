@extends('layout.mainlayout')
@section('title', 'Class')

@section('content')
    <h2>Class Detail</h2>
    {{-- {{$class}} --}}
    <h3>Data Class : </h3>
    <table class="table table-bordered">
        <tr>
            <th>Class Name</th>
            <th>HomeRoom teacher</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>{{$class->name}}</td>
            <td>{{$class->homeRoomTeacher->name}}</td>
            <td>
                @foreach($class->student as $s)
                    - {{$s->name}}<br/>
                @endforeach
            </td>
        </tr>
    </table>   
    
    <style>
        th {
            width:33%;
        }
    </style>
    
@endsection
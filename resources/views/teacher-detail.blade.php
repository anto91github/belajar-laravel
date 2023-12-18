@extends('layout.mainlayout')
@section('title', 'Teacher')

@section('content')
    <h2>Teacher Detail</h2>
    {{$teacher}}
    <h3>Data Teacher : </h3>
    <table class="table table-bordered">
        <tr>
            <th>Teacher Name</th>
            <th>Class </th>
            <th>Student</th>
        </tr>
        <tr>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->class->name}}</td>            
            <td>
                @foreach($teacher->class->student as $s)
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
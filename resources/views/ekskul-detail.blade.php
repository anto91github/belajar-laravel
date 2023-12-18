@extends('layout.mainlayout')
@section('title', 'Ekskul')

@section('content')
    <h2>Ekskul Detail</h2>
    {{-- {{$ekskul}} --}}
    <h3>Data Ekskul : </h3>
    <table class="table table-bordered">
        <tr>
            <th>Ekskul Name</th>
            <th>Student</th>
        </tr>
        <tr>
            <td>{{$ekskul->name}}</td>            
            <td>
                @foreach($ekskul->student as $s)
                    - {{$s->name}}<br/>
                @endforeach
            </td>
        </tr>
    </table>   
    
    <style>
        th {
            width:50%;
        }
    </style>
    
@endsection
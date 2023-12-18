@extends('layout.mainlayout')
@section('title', 'Ekskul')

@section('content')
    <h1>This is Ekskul</h1>
    <h3>Ekskul List</h3>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Name</th>
            {{-- <th>Student</th> --}}
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    {{-- <td>
                        @foreach($data->student as $s)
                        {{$s -> name}} <br>
                        @endforeach
                        
                    </td> --}}
                    <td><a href="ekskul/{{$data->id}}">Detail</a></td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    
@endsection
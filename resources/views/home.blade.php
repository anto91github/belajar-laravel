@extends('layout.mainlayout')
@section('title', 'Home')

@section('content')
    <h1>This is home</h1>
    <h2> Welcome {{$name}}</h2>
    <h2> Your role {{$role}}</h2>

    {{-- @if ($role == 'admin')
        <a href=""> go to admin </a>
    @elseif ($role == 'staff')
        <a href=""> go to staff </a>
    @else
        <a href=""> go to manager </a>
    @endif --}}

    {{-- @switch($role)
        @case('admin')
            <a href=""> go to admin </a>
            @break
        @case('staff')
            <a href=""> go to staff </a>
            @break
        @default
            <a href=""> go to manager </a>
    @endswitch --}}

    {{-- @foreach ($buah as $data)
        {{$data}} <br />
    @endforeach --}}
    <table class="table">
        <tr>
            <th>No.</th>
            <th>Nama</th>
        </tr>
        @foreach ($buah as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item}}</td>
            </tr>
        @endforeach
        
    </table>
@endsection
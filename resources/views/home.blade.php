<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel 9 | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blade templating</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
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
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
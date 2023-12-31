<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel 9 | @yield('title')</title>
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'home')
                            active
                        @endif
                    " aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'students')
                            active
                        @endif
                    " aria-current="page" href="/students">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'class')
                            active
                        @endif
                    " aria-current="page" href="/class">Class</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'teacher')
                            active
                        @endif
                    " aria-current="page" href="/teacher">Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'ekskul')
                            active
                        @endif
                    " aria-current="page" href="/ekskul">Ekskul</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'about')
                            active
                        @endif
                    " aria-current="page" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-provinsi">API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                        @if($pageTitle == 'Cek Ongkir')
                            active
                        @endif
                    " aria-current="page" href="/cek-ongkir">Ongkir</a>
                </li>

                
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
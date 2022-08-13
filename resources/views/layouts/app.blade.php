<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module 05</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('include/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- start of header -->

    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">My Web Application</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu 3</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu 4</a></li>
                </ul>
            </header>
        </div>

        <div class="container">

            @yield('content')


        </div>


    </main>
</head>
<body>


<script src="{{ asset('include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

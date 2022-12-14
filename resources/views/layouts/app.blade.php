<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? env('APP_NAME') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('include/bootstrap-5.1.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
@if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@yield('content')


<script src="{{ asset('include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js') }}"></script>
@yield('scripts')
</body>
</html>

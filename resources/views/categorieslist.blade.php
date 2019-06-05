<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<h1 class="text-center my-5">Category</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Categories
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            {{ $category->category }}

                            <a href="/categories/{{ $category->id }}" class="btn btn-primary btn-sm float-right">View</a>

                            <a href="/categories/{{ $category->id }}" class="btn btn-secondary btn-sm float-right">Edit</a>

                            <a href="/categories/{{ $category->id }}" class="btn btn-danger btn-sm float-right">Delete</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>

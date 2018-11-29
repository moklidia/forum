<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    {{--<link rel="stylesheet" type="text/css" href="/css/app.css">--}}
    <title>@yield('title')</title>
    {{--	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">--}}


    <ul class="nav nav-tabs">

        <li class="nav-item">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
        </li>

        <li class="nav-item">
            <a class="navbar-brand" href="{{ URL::to('groups') }}">Groups</a>
        </li>

        <li class="nav-item">
            <a class="navbar-brand" href="{{ URL::to('students') }}">Students</a>
        </li>

        <li class="nav-item">
            <a class="navbar-brand" href="{{ URL::to('subjects') }}">Subjects</a>
        </li>

        <li class="nav-item"><a class="navbar-brand" href="{{ URL::to('results') }}">Results</a></li>
    </ul>

</head>
<body>

<div class="container">
		@yield('content')
	</div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>



@php
    $nav = [
        [
            'slug' => '/',
            'title' => 'Startpagina',
        ],
        [
            'slug' => '/over-ons',
            'title' => 'Over ons',
        ],
        [
            'slug' => '/contact',
            'title' => 'Contact',
        ],
        [
            'slug' => '/inloggen',
            'title' => 'Inloggen',
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Lesmateriaal</title>
	<link rel="stylesheet" href="/css/app.css" />
</head>
<body>
	@include('inc.navbar')

	<main id="main">
		@if(Request::is('/'))
			@include('inc.jumbotron')
		@endif
		<div class="container">
			@yield('content')
		</div>
	</main>

	@include('inc.footer')
    <script src="/js/app.js"></script>
</body>
</html>
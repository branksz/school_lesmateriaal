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

<nav class="navbar navbar-expand-lg navbar-light" id="header">
    <div class="container">
        <a class="navbar-brand" href=""><img src="public/img/logo-nieuwsbegrip.svg" alt="Site logo"></a>
        <button class="navbar-toggler mr-5 mr-sm-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-lg-row ml-lg-auto d-lg-none d-lg-flex mr-3">
                @foreach ($nav as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $item['slug'] }}">{{ $item['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
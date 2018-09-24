<nav class="navbar navbar-expand-lg navbar-light mt-2 mb-2" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/img/logo.png" width="160" alt="Site logo"></a>
        <button class="navbar-toggler mr-5 mr-sm-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-lg-row ml-lg-auto d-lg-none d-lg-flex mr-3">
                @foreach ($nav as $item)
                    <li class="nav-item {{ ($item['title'] == 'Inloggen' ? 'ml-2 btn-secondary' : '') }}">
                        <a class="nav-link {{ ($item['title'] == 'Inloggen' ? 'text-white' : '') }}" href="{{ url('/') }}{{ $item['slug'] }}">{{ $item['title'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
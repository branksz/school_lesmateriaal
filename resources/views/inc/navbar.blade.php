<nav class="navbar navbar-expand-lg navbar-light mt-2 mb-2" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/') }}/img/logo.png" width="160" alt="Site logo"></a>
        <button class="navbar-toggler mr-5 mr-sm-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav flex-lg-row ml-lg-auto d-lg-none d-lg-flex mr-3">
                @foreach ($nav as $item)
                    @if($item['title'] == 'Inloggen' && Auth::user())
                        <li class="nav-item">
                            <li class="nav-item ml-2 mr-2 btn-secondary">
                                <a class="nav-link text-white" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                            <a class="nav-link dropdown-toggle" id="userDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-lg fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropDown">
                                <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                                <a class="dropdown-item" href="/account">Mijn profiel</a>
                                <a class="dropdown-item" href="/account/wachtwoordveranderen">Wachtwoord veranderen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/uitloggen">Uitloggen</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item {{ ($item['title'] == 'Inloggen' ? 'ml-2 btn-secondary' : '') }}">
                            <a class="nav-link {{ ($item['title'] == 'Inloggen' ? 'text-white' : '') }}" href="{{ url('/') }}{{ $item['slug'] }}">{{ $item['title'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
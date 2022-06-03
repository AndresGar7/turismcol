<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm menu" style="z-index: 100;">
    <div class="container">
        <a class="navbar-brand nameLogo" href="{{ route('index') }}">
            <img src="/img/palma.png" alt="" width="60" height="55" class="imgLogo d-inline-block align-text-top">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link fs-5 {{ setActive('index') }}" href={{ route('index') }}><strong>Inicio</strong></a></li>
                <li class="nav-item"><a class="nav-link fs-5 {{ setActive('galeria.index') }}" href={{ route('galeria.index') }}><strong>Galeria</strong></a></li>
                <li class="nav-item"><a class="nav-link fs-5 {{ setActive('noticias.*')}}" href={{ route('noticias.index') }}><strong>Noticias</strong></a></li>
                <li class="nav-item"><a class="nav-link fs-5 {{ setActive('presupuesto.index')}}" href={{ route('presupuesto.index') }}><strong>Presupuesto</strong></a></li>
                <li class="nav-item"><a class="nav-link fs-5 {{ setActive('contacto.index')}}" href={{ route('contacto.index') }}><strong>Contacto</strong></a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">
                            Administración
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>
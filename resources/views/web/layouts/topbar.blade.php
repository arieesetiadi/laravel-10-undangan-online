{{-- Navbar Start --}}
<nav class="navbar {{ $topbar['variant'] ?? '' }} navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        {{-- Logo --}}
        <a class="logo text-uppercase" href="{{ route('web.home') }}">
            <img class="logo-light" src="{{ asset('assets/web/images/logo-light.png') }}" alt="Logo Light" height="20" />
            <img class="logo-dark" src="{{ asset('assets/web/images/logo-dark.png') }}" alt="Logo Dark" height="20" />
        </a>

        <button class="btn navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav navbar-center mt-lg-0 ml-auto mt-2" id="navbar-navlist">
                <li class="nav-item">
                    <a class="nav-link" id="scrollElement" href="{{ route('web.home', app()->getLocale()) }}">{{ __('general.words.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.home', app()->getLocale()) }}#about">{{ __('general.words.about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.home', app()->getLocale()) }}#pricing">{{ __('general.words.pricing') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.home', app()->getLocale()) }}#contact">{{ __('general.words.contact') }}</a>
                </li>
            </ul>

            @if (!auth('web')->check())
                {{-- Topbar Login --}}
                <a class="btn btn-sm btn-primary navbar-btn my-lg-0 my-2" href="{{ route('web.auth.login.index', app()->getLocale()) }}">
                    {{ __('auth.login.word') }}
                </a>

                {{-- Topbar Register --}}
                <a class="btn btn-sm btn-info navbar-btn my-lg-0 my-2" href="{{ route('web.auth.register.index', app()->getLocale()) }}">
                    {{ __('auth.register.word') }}
                </a>
            @else
                {{-- Topbar Profile --}}
                <a class="btn btn-sm btn-primary navbar-btn my-lg-0 {{ $topbar['profile'] ?? '' }} my-2" href="{{ route('web.profile.index', app()->getLocale()) }}" aria-current="page">
                    <i class="fa-solid fa-user d-inline-block mr-1"></i> {{ customer()->name }}
                </a>

                {{-- Topbar Logout --}}
                <a class="btn btn-sm btn-primary navbar-btn my-lg-0 my-2" href="{{ route('web.logout.process', app()->getLocale()) }}">
                    <i class="fa-solid fa-power-off d-inline-block mr-1"></i> {{ __('auth.logout.word') }}
                </a>
            @endif

            {{-- Locale Switcher --}}
            <div class="btn-group navbar-btn my-lg-0 my-2" role="group" aria-label="Locale switcher button group">
                @foreach (AppLocale::values() as $locale)
                    <a class="btn btn-sm {{ app()->getLocale() == $locale ? 'btn-info' : 'btn-outline-info' }}" type="button" href="{{ route('locale.switch', $locale) }}">
                        {{ AppLocale::label($locale) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
{{-- Navbar End --}}
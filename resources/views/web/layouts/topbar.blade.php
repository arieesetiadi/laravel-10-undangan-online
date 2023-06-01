<!--Navbar Start-->
<nav class="navbar @yield('topbar.variant') navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <!-- LOGO -->
        <a class="logo text-uppercase" href="{{ route('web.home') }}">
            <img src="{{ asset('assets/web/images/logo-light.png') }}" alt="" class="logo-light" height="20" />
            <img src="{{ asset('assets/web/images/logo-dark.png') }}" alt="" class="logo-dark" height="20" />
        </a>

        <button class="btn navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto navbar-center mt-lg-0 mt-2" id="navbar-navlist">
                <li class="nav-item">
                    <a href="{{ route('web.home', app()->getLocale()) }}" class="nav-link" id="scrollElement">{{ __('general.words.home') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.home', app()->getLocale()) }}#about" class="nav-link">{{ __('general.words.about') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.home', app()->getLocale()) }}#pricing" class="nav-link">{{ __('general.words.pricing') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('web.home', app()->getLocale()) }}#contact" class="nav-link">{{ __('general.words.contact') }}</a>
                </li>
            </ul>

            @if (!auth('web')->check())
                {{-- Topbar Login --}}
                <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="btn btn-sm btn-primary navbar-btn my-lg-0 my-2">
                    {{ __('auth.login.word') }}
                </a>

                {{-- Topbar Register --}}
                <a href="{{ route('web.auth.register.index', app()->getLocale()) }}" class="btn btn-sm btn-info navbar-btn my-lg-0 my-2">
                    {{ __('auth.register.word') }}
                </a>
            @else
                {{-- Topbar Profile --}}
                <a href="{{ route('web.profile.index', app()->getLocale()) }}" class="btn btn-sm btn-primary navbar-btn my-lg-0 my-2 @yield('topbar.profile')" aria-current="page">
                    <i class="fa-solid fa-user d-inline-block mr-1"></i> {{ customer()->name }}
                </a>

                {{-- Topbar Logout --}}
                <a href="{{ route('web.logout.process', app()->getLocale()) }}" class="btn btn-sm btn-primary navbar-btn my-lg-0 my-2">
                    <i class="fa-solid fa-power-off d-inline-block mr-1"></i> {{ __('auth.logout.word') }}
                </a>
            @endif

            {{-- Locale Switcher --}}
            <div class="btn-group navbar-btn my-lg-0 my-2" role="group" aria-label="Locale switcher button group">
                @foreach (AppLocale::values() as $locale)
                    <a href="{{ route('locale.switch', $locale) }}" type="button" class="btn btn-sm {{ app()->getLocale() == $locale ? 'btn-info' : 'btn-outline-info' }}">
                        {{ AppLocale::label($locale) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->

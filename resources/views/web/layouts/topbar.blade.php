    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index-1.html">
                <img src="{{ asset('assets/web/images/logo-light.png') }}" alt="" class="logo-light" height="20" />
                <img src="{{ asset('assets/web/images/logo-dark.png') }}" alt="" class="logo-dark" height="20" />
            </a>

            <a href="#" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center mt-lg-0 mt-2" id="navbar-navlist">
                    <li class="nav-item">
                        <a href="#home" class="nav-link" id="scrollElement">{{ __('general.words.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">{{ __('general.words.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">{{ __('general.words.pricing') }}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">{{ __('general.words.contact') }}</a>
                    </li>
                </ul>
                @if (!auth('web')->check())
                    <a href="{{ route('web.auth.login.index') }}" class="btn btn-primary btn-sm navbar-btn my-lg-0 my-2">
                        {{ __('auth.login.word') }}
                    </a>
                    <a href="{{ route('web.auth.register.index') }}" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">
                        {{ __('auth.register.word') }} <i class="mdi mdi-arrow-right ml-1"></i>
                    </a>
                @else
                    <div class="btn-group">
                        <a href="{{ route('web.profile.index') }}" class="btn btn-sm btn-primary my-lg-0 my-2 @yield('topbar.profile')" aria-current="page">
                            <i class="fa-solid fa-user d-inline-block mr-1"></i> {{ customer()->name }}
                        </a>
                        <a href="{{ route('web.logout.process') }}" class="btn btn-sm btn-primary my-lg-0 my-2">
                            <i class="fa-solid fa-power-off d-inline-block mr-1"></i> {{ __('auth.logout.word') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

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
                    <a href="{{ route('web.auth.register.index') }}" class="btn btn-info btn-sm navbar-btn my-lg-0 my-2">{{ __('auth.register.word') }}</a>
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

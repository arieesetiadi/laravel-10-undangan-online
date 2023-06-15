<section class="hero-1 bg-primary" id="home">
    <div class="bg-overlay overflow-hidden bg-transparent">
        <div class="hero-1-bg"></div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="hero-wrapper text-white-50 text-center">
                    <h5 class="text-white-50 home-small-title">Awesome Design</h5>
                    <h1 class="hero-1-title display-4 text-white mb-4">We love make things amazing and simple</h1>

                    <p class="mb-4">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>

                    @if (!auth('web')->check())
                        <div class="pt-2">
                            <a href="{{ route('web.auth.login.index', app()->getLocale()) }}" class="btn btn-primary mr-2">
                                {{ __('auth.login.word') }}
                            </a>
                            <a href="{{ route('web.auth.register.index', app()->getLocale()) }}" class="btn btn-info">
                                {{ __('auth.register.word') }} <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </a>
                        </div>
                    @endif

                    <div class="home-img mt-5">
                        <img src="{{ asset('assets/web/images/home-img.png') }}" alt="Homepage Banner" class="img-fluid mx-auto d-block" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero-1 bg-primary" id="home">
    <!-- bg-overlay-img -->
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

                    <div class="pt-2">
                        <a href="{{ route('web.auth.login.index') }}" class="btn btn-light mr-2">{{ __('auth.login.word') }}</a>
                        <a href="{{ route('web.auth.register.index') }}" class="btn btn-info">{{ __('auth.register.word') }} <i class="mdi mdi-arrow-right ml-1"></i></a>
                    </div>

                    <div class="home-img mt-5">
                        <img src="{{ asset('assets/web/images/home-img.png') }}" alt="" class="img-fluid mx-auto d-block" />
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

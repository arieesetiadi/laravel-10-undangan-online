@extends('web.layouts.master')

@section('content')
    <!-- Hero section Start -->
    @include('web.sections.hero')
    <!-- Hero section End -->

    <!-- Start About -->
    <section class="section" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h3 class="mb-3">A digital web design studio creating modern & engaging online</h3>
                        <p class="text-muted">
                            If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages new common will be more regular than the existing If several is more
                            simple and regular than that of the individual languages new common will be more regular than the existing
                        </p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="text-center p-4">
                        <div class="icons-xl mb-3">
                            <i class="uim uim-ruler"></i>
                        </div>

                        <h5>Web Designing</h5>
                        <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more regular than that of the individual</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="text-center p-4">
                        <div class="icons-xl mb-3">
                            <i class="uim uim-repeat"></i>
                        </div>

                        <h5>Programming</h5>
                        <p class="text-muted">To achieve this, it would be necessary to have uniform more common several languages coalesce</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="text-center p-4">
                        <div class="icons-xl mb-3">
                            <i class="uim uim-airplay"></i>
                        </div>

                        <h5>Software Development</h5>
                        <p class="text-muted">For science, music, sport, etc, Europe uses the same vocabulary only differ in their pronunciation.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end About -->

    <!-- Start Features -->
    <section class="section bg-light" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center title mb-5">
                        <p class="text-muted text-uppercase fw-normal mb-2">Features</p>
                        <h3 class="mb-3">Key features of the product</h3>
                        <div class="title-icon position-relative">
                            <div class="position-relative">
                                <i class="uim uim-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row align-items-center">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="mt-4 mt-lg-0">
                        <h4>Improve your Marketing business</h4>
                        <p class="text-muted mt-3">If several languages coalesce, the grammar of the resulting language is more regular.</p>

                        <div>
                            <p class="mb-2 text-muted">
                                <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>Donec vitae sapien ut
                            </p>
                            <p class="mb-2 text-muted">
                                <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>In enim justo, rhoncus imperdiet
                            </p>
                            <p class="text-muted">
                                <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>Maecenas nec odio et
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-primary">Learn more..</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 ml-lg-auto col-sm-8 order-1 order-lg-2">
                    <div>
                        <img src="{{ asset('assets/web/images/features/img-1.jpg') }}" alt="" class="img-fluid mx-auto d-block" />
                    </div>
                </div>
            </div>
            <!-- end row -->

            <hr class="my-5" />

            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-8">
                    <div class="features-img mt-4">
                        <img src="{{ asset('assets/web/images/features/img-2.jpg') }}" alt="" class="img-fluid mx-auto d-block img-thumbnail" />
                    </div>
                </div>

                <div class="col-lg-5 ml-lg-auto">
                    <div class="mt-5 mt-lg-4">
                        <h4>Improve your Marketing performance</h4>
                        <p class="text-muted mb-2 mt-3">It will be as simple as in fact, it will be Occidental. To an English person, it will seem like simplified</p>
                        <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur velit</p>
                        <div class="mt-4">
                            <a href="#" class="text-primary">Learn more..</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Features -->

    <!-- Start Clients -->
    <section class="section mt-5" id="clients">
        <div class="container">
            <div class="row pb-5 align-items-center">
                <div class="col-lg-4 col-md-4">
                    <div class="icons-lg mb-4">
                        <i class="uim uim-comment-message"></i>
                    </div>
                    <h3 class="mb-2">2,200<sup>+</sup></h3>
                    <h3 class="mb-4">Satisfied Clients</h3>
                    <p class="text-muted mb-sm-0 mb-5 pb-sm-0 pb-4">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual</p>
                </div>

                <div class="col-lg-8 col-md-8">
                    <div class="client-slider">
                        <div>
                            <div class="bg-light rounded p-4">
                                <p class="text-muted mb-4">" It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified, If several languages of the resulting language"</p>
                                <div class="pt-3">
                                    <div class="d-inline-block">
                                        <h5 class="font-16 mb-1">James Vazquez</h5>
                                        <span class="text-muted">- Peyso User</span>
                                    </div>
                                    <div class="text-muted d-inline-block float-right">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-light rounded p-4">
                                <p class="text-muted mb-4">" To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages of the resulting language."</p>

                                <div class="pt-3">
                                    <div class="d-inline-block">
                                        <h5 class="font-16 mb-1">Clara Searcy</h5>
                                        <span class="text-muted">- Peyso User</span>
                                    </div>
                                    <div class="text-muted d-inline-block float-right">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="bg-light rounded p-4">
                                <p class="text-muted mb-4">
                                    " If several It will be as simple as Occidental; it will be Occidental. To an English person, it will seem like simplified, If several languages of the resulting language "
                                </p>
                                <div class="pt-3">
                                    <div class="d-inline-block">
                                        <h5 class="font-16 mb-1">Alfredo Williams</h5>
                                        <span class="text-muted">- Peyso User</span>
                                    </div>
                                    <div class="text-muted d-inline-block float-right">
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start brand logo -->
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-3">
                    <div class="client-images">
                        <img src="{{ asset('assets/web/images/clients/1.png') }}" alt="client-img" class="mx-auto img-fluid d-block" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="client-images">
                        <img src="{{ asset('assets/web/images/clients/3.png') }}" alt="client-img" class="mx-auto img-fluid d-block" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="client-images">
                        <img src="{{ asset('assets/web/images/clients/4.png') }}" alt="client-img" class="mx-auto img-fluid d-block" />
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="client-images">
                        <img src="{{ asset('assets/web/images/clients/6.png') }}" alt="client-img" class="mx-auto img-fluid d-block" />
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End Clients -->

    <!-- Start cta section -->
    <section class="py-5 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="text-white-50">
                        <h3 class="text-white">Build your dream website today</h3>
                        <p class="mb-0 fs-6">If several languages coalesce, the grammar of the resulting</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mt-4 mt-md-0 text-md-right">
                        <a href="#" class="btn btn-info">Get Started</a>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- End cta section -->

    <!-- Start pricing -->
    <section class="section bg-light" id="pricing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center title mb-5">
                        <p class="text-muted text-uppercase fw-normal mb-2">Plan</p>
                        <h3 class="mb-3">Our Pricing</h3>
                        <div class="title-icon position-relative">
                            <div class="position-relative">
                                <i class="uim uim-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row pb-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card plan-box text-center p-2">
                        <div class="card-body">
                            <div class="icons-xl pt-4">
                                <i class="uim uim-box"></i>
                            </div>
                            <h4 class="mt-4">Economy</h4>

                            <div class="plan-features text-muted mt-5">
                                <p>Storage : <span class="text-info fw-semibold">10 GB</span></p>
                                <p>Bandwidth : <span class="text-info fw-semibold">500 GB</span></p>
                                <p>Domain : <span class="text-info fw-semibold">No</span></p>
                                <p>Support : <span class="text-info fw-semibold">No</span></p>
                            </div>

                            <div class="mt-5">
                                <h3>
                                    <sup><small>$</small></sup>19 / <span class="font-16 text-muted">Month</span>
                                </h3>
                                <div class="mt-4 mb-4">
                                    <a href="#" class="btn btn-info btn-block">Join now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card plan-box text-center p-2">
                        <div class="card-body">
                            <div>
                                <div class="icons-xl pt-4">
                                    <i class="uim uim-rocket"></i>
                                </div>
                                <h4 class="mt-4">Premium</h4>

                                <div class="plan-features text-muted mt-5">
                                    <p>Storage : <span class="text-info fw-semibold">20 GB</span></p>
                                    <p>Bandwidth : <span class="text-info fw-semibold">800 GB</span></p>
                                    <p>Domain : <span class="text-info fw-semibold">Yes</span></p>
                                    <p>Support : <span class="text-info fw-semibold">Yes</span></p>
                                </div>

                                <div class="mt-5">
                                    <h3>
                                        <sup><small>$</small></sup>29 / <span class="font-16 text-muted">Month</span>
                                    </h3>
                                    <div class="mt-4 mb-4">
                                        <a href="#" class="btn btn-info btn-block">Join now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card plan-box text-center p-2">
                        <div class="card-body">
                            <div>
                                <div class="icons-xl pt-4">
                                    <i class="uim uim-user-md"></i>
                                </div>
                                <h4 class="mt-4">Developer</h4>

                                <div class="plan-features text-muted mt-5">
                                    <p>Storage : <span class="text-info fw-semibold">30 GB</span></p>
                                    <p>Bandwidth : <span class="text-info fw-semibold">Unlimited</span></p>
                                    <p>Domain : <span class="text-info fw-semibold">Yes</span></p>
                                    <p>Support : <span class="text-info fw-semibold">Yes</span></p>
                                </div>

                                <div class="mt-5">
                                    <h3>
                                        <sup><small>$</small></sup>39 / <span class="font-16 text-muted">Month</span>
                                    </h3>
                                    <div class="mt-4 mb-4">
                                        <a href="#" class="btn btn-info btn-block">Join now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end plans row -->

            <!-- start faq -->
            <div class="row mb-5 pb-4">
                <div class="col-lg-6 col-md-6">
                    <div class="mt-5 d-flex">
                        <div class="mr-3">
                            <div class="avatar-title rounded-circle bg-soft-primary avatar-md text-primary">
                                <i class="mdi mdi-help"></i>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-18 mt-1">What is Lorem Ipsum ?</h5>
                            <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual</p>
                        </div>
                    </div>

                    <div class="mt-4 d-flex">
                        <div class="mr-3">
                            <div class="avatar-title rounded-circle bg-soft-primary avatar-md text-primary">
                                <i class="mdi mdi-help"></i>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-18 mt-1">Why do we use it ?</h5>
                            <p class="text-muted">For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="mt-sm-5 mt-4 d-flex">
                        <div class="mr-3">
                            <div class="avatar-title rounded-circle bg-soft-primary avatar-md text-primary">
                                <i class="mdi mdi-help"></i>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-18 mt-1">Where does it come from ?</h5>
                            <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                        </div>
                    </div>

                    <div class="mt-4 d-flex">
                        <div class="mr-3">
                            <div class="avatar-title rounded-circle bg-soft-primary avatar-md text-primary">
                                <i class="mdi mdi-help"></i>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-18 mt-1">Where can I get some ?</h5>
                            <p class="text-muted">It will be as simple as in fact, it will be Occidental. To it will seem like simplified English as a skeptical</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end faq row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end pricing -->

    <!-- Start contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card contact-section-card mb-0">
                        <div class="card-body p-md-5">
                            <div class="text-center title mb-5">
                                <p class="text-muted text-uppercase fw-normal mb-2">Contact</p>
                                <h3 class="mb-3">Have any Questions ?</h3>
                                <div class="title-icon position-relative">
                                    <div class="position-relative">
                                        <i class="uim uim-arrow-circle-down"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- start form -->
                            <form method="post" name="myForm" onsubmit="return validateForm()" href="javascript: void(0);">
                                <p id="error-msg"></p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name..." />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email address</label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email..." />
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="mb-3">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input name="subject" id="subject" type="text" class="form-control" placeholder="Enter Subject..." />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="comments">Message</label>
                                    <textarea name="comments" id="comments" rows="3" class="form-control" placeholder="Enter your message..."></textarea>
                                </div>

                                <div class="text-right">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Send message" />

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end contact -->

    <!-- start footer -->
    <footer class="footer bg-dark text-white-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="#" class="d-block mb-3">
                        <img src="{{ asset('assets/web/images/logo-light.png') }}" alt="" height="20" />
                    </a>
                    <p>Bootstrap 5 Landing Page Template</p>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="mt-4 mt-lg-0">
                        <h5 class="mb-4 font-18 text-white">Links</h5>
                        <ul class="list-unstyled footer-list-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="mt-4 mt-lg-0">
                        <h5 class="mb-4 font-18 text-white">Resources</h5>
                        <ul class="list-unstyled footer-list-menu">
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="mt-4 mt-lg-0">
                        <h5 class="mb-4 font-18 text-white">Social</h5>
                        <ul class="list-inline social-icons-list">
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="mdi mdi-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- end footer -->

    <!-- Start footer-alt -->
    <section class="footer-alt py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-white-50">
                        <p class="mb-0">2020 © Peyso. Create by Themesdesign</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end footer-alt -->
@endsection

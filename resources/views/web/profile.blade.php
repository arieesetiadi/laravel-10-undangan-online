{{-- Master Template --}}
@extends('web.layouts.master')

{{-- Topbar Configuration --}}
@section('topbar.variant')
    navbar-light
@endsection

@section('topbar.profile')
    active
@endsection

{{-- Content --}}
@section('content')
    {{-- Section Profile --}}
    <section class="section" id="profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mt-lg-5">
                    <div class="text-center title mb-5">
                        <p class="text-muted text-uppercase fw-normal mb-2">{{ $title }}</p>
                        <h3 class="mb-3">{{ customer()->name }}</h3>
                        <div class="title-icon position-relative">
                            <div class="position-relative">
                                <i class="uim uim-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3">
                    <h6 class="text-center">{{ __('general.words.attributes.username') }}</h6>
                    <p class="mb-2 text-center">{{ customer()->username }}</p>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3">
                    <h6 class="text-center">{{ __('general.words.attributes.name') }}</h6>
                    <p class="mb-2 text-center">{{ customer()->name }}</p>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3">
                    <h6 class="text-center">{{ __('general.words.attributes.email') }}</h6>
                    <p class="mb-2 text-center">{{ customer()->email }} </p>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mt-3">
                    <h6 class="text-center">{{ __('general.words.attributes.phone') }}</h6>
                    <p class="mb-2 text-center">{{ customer()->phone ?? '-' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Detail --}}
    <section class="section bg-light" id="detail">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center title mb-5">
                        <p class="text-muted text-uppercase fw-normal mb-2">{{ __('general.words.detail') }}</p>
                        <h3 class="mb-3">{{ __('general.words.transaction') }}</h3>
                        <div class="title-icon position-relative">
                            <div class="position-relative">
                                <i class="uim uim-arrow-circle-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col order-2 order-lg-1">
                    <h6>{{ __('general.words.attributes.username') }}</h6>
                    <p class="mb-2">
                        <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>
                        {{ customer()->username }}
                    </p>
                </div>
                <div class="col order-2 order-lg-1">
                    <h6>{{ __('general.words.attributes.name') }}</h6>
                    <p class="mb-2">
                        <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>
                        {{ customer()->name }}
                    </p>
                </div>
                <div class="col order-2 order-lg-1">
                    <h6>{{ __('general.words.attributes.email') }}</h6>
                    <p class="mb-2">
                        <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>
                        {{ customer()->email }}
                    </p>
                </div>
                <div class="col order-2 order-lg-1">
                    <h6>{{ __('general.words.attributes.phone') }}</h6>
                    <p class="mb-2">
                        <span class="uim-icon-info mr-2 align-middle"><i class="uim uim-check-circle"></i></span>
                        {{ customer()->phone ?? '-' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

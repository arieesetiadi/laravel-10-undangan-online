@stack('before-styles')

{{-- Styles --}}
<link rel="shortcut icon" href="{{ asset('assets/web/images/favicon.ico') }}" />
<link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/materialdesignicons.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/web/css/tiny-slider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/style.css') }}" />

{{-- Custom --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/custom.css') }}" />

@stack('after-styles')

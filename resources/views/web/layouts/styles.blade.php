@stack('before-styles')

{{-- Styles --}}
<link rel="shortcut icon" href="{{ asset('assets/web/images/favicon.ico') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/materialdesignicons.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/tiny-slider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/style.css') }}" />

{{-- Icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

{{-- Custom --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/web/css/custom.css') }}" />

@stack('after-styles')

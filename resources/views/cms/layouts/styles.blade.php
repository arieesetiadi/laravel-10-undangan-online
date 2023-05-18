@stack('before-styles')

{{-- Icons --}}
<link type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />

{{-- Styles --}}
<link type="text/css" href="{{ asset('assets/cms/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/cms/plugins/perfectscroll/perfect-scrollbar.min.js') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/cms/plugins/pace/pace.min.js') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/cms/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
<link type="text/css" href="{{ asset('assets/cms/css/main.min.css') }}" rel="stylesheet">
{{-- <link type="text/css" href="{{ asset('assets/cms/css/darktheme.css') }}" rel="stylesheet"> --}}
<link type="text/css" href="{{ asset('assets/cms/css/custom.css') }}" rel="stylesheet">

{{-- Favicon --}}
<link type="image/png" rel="icon" sizes="32x32" href="{{ asset('assets/cms/images/neptune.png') }}" />

@stack('after-styles')

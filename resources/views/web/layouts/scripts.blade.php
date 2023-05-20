@stack('before-scripts')

{{-- Scripts --}}
<script type="application/javascript" src="{{ asset('assets/cms/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/plugins/datatables/datatables.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/js/pages/datatables.js') }}"></script>

<script type="application/javascript" src="https://unicons.iconscout.com/release/v2.1.11/script/monochrome/bundle.js"></script>
<script type="application/javascript" src="{{ asset('assets/web/js/tiny-slider.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/web/js/app.js') }}"></script>

{{-- CDN --}}
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Form Validation --}}
<script type="application/javascript" src="{{ asset('assets/cms/js/pages/form-validation.js') }}"></script>

{{-- Custom --}}
<script type="application/javascript" src="{{ asset('assets/web/js/custom.js') }}"></script>

@stack('after-scripts')

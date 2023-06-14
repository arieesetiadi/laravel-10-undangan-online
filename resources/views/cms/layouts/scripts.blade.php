@stack('before-scripts')

{{-- Local --}}
<script type="application/javascript" src="{{ asset('assets/cms/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/plugins/pace/pace.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/plugins/datatables/datatables.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/js/pages/datatables.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/js/main.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('assets/cms/js/custom.js') }}"></script>

{{-- Jquery Validator --}}
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

{{-- Sweet Alert 2 --}}
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Validator Helper --}}
@include('libs.validator')

@stack('after-scripts')

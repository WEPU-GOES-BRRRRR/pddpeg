@if (session()->has('text'))
    <script>
        Swal.fire({
            title: `{{ session()->get('title') }}`,
            icon: `{{ session()->get('icon') }}`,
            text: `{{ session()->get('text') }}`
        });
    </script>
@endif

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('sbadmin2') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('sbadmin2') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('sbadmin2') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('sbadmin2') }}/js/sb-admin-2.min.js"></script>

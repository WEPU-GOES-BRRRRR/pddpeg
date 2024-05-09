<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials.meta-dashboard')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-sidebar-dashboard />

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.partials.navbar-dashboard')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            @include('layouts.partials.footer-dashboard')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('layouts.partials.modal-dashboard')

    @include('layouts.partials.script-dashboard')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $globalSetting->company_name ?? 'Sri Shyam Crackers' }} | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin & Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon"
        href="{{ $globalSetting && $globalSetting->favicon ? asset($globalSetting->favicon) : asset('assets/images/favicon.ico') }}">

    <!-- plugin css -->
    <link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="/assets/css/preloader.min.css" type="text/css" />
    <!-- C3 charts css -->
    <link href="/assets/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Summernote css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/c3/c3.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Merriweather&family=Roboto&display=swap"
        rel="stylesheet">
    @stack('css')
</head>
<style>
    .toast-black-text {
        color: black !important;
    }
</style>

<body>
    <div id="layout-wrapper">

        @include('layout.header')
        @include('layout.sidebar')

        <div class="main-content">
            <div class="page-content">
                @yield('main_content')
            </div>
            @include('layout.footer')
        </div>
        @stack('scripts')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="/assets/libs/pace-js/pace.min.js"></script>


    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Plugins js-->
    <script src="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <script src="/assets/js/pages/allchart.js"></script>
    <!-- dashboard init -->
    <script src="/assets/js/pages/dashboard.init.js"></script>

    <!--Summernote js-->
    <!--<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>-->
    <!--<script src="/assets/pages/form-summernote.init.js"></script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>-->


    <!--C3 Chart-->
    <script src="/assets/plugins/d3/d3.min.js"></script>
    <script src="/assets/plugins/c3/c3.min.js"></script>
    <script src="/assets/pages/c3-chart-init.js"></script>

    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/custom.js"></script>

    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/libs/jszip/jszip.min.js"></script>
    <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>



    <!-- Responsive examples -->
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/js/pages/datatables.init.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Select all buttons with the class
            document.querySelectorAll(".addstatusorder").forEach(function (button) {
                button.addEventListener("click", function () {

                    document.getElementById("add_status_id").value = this.getAttribute("data-id");
                });
            });
        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        window.onload = function () {
            if (performance.navigation.type === 2) {
                window.location.href = "/"; // Redirect to the dashboard if the user presses back
            }
        };
    </script>

    @yield('scripts')
    @stack('scripts')
    @stack('modals')
</body>

</html>
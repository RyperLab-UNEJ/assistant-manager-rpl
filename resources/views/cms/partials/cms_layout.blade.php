<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('cms/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('cms/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('cms/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('cms/images/favicon.png') }}" />

    {{-- fontawsome --}}
    <script src="https://kit.fontawesome.com/d79b975262.js" crossorigin="anonymous"></script>

    @livewireStyles
    {{-- Alpine JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <div class="container-scroller"> 
        {{-- SECTION FOR NAVBAR --}}
        @include('cms.partials.navbar')
        <div class="container-fluid page-body-wrapper">
                {{-- SIDEBAR SECTION --}}
                @include('cms.partials.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        {{-- MAIN CONTENT SECTION --}}
                        @yield('heading-content')
                        @if (Session::has('success'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @yield('main-content')
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                        </div>
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
                        </div>
                    </footer> 
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
        </div>   
            <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('cms/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('cms/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('cms/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('cms/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('cms/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('cms/js/off-canvas.js') }}"></script>
    <script src="{{ asset('cms/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('cms/js/template.js') }}"></script>
    <script src="{{ asset('cms/js/settings.js') }}"></script>
    <script src="{{ asset('cms/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('cms/js/dashboard.js') }}"></script>
    <script src="{{ asset('cms/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    @yield('after-script')
    @livewireScripts
</body>

</html>


<!DOCTYPE html>
<html lang="en">

 @include('layouts.head')

<body>
    <!-- Sidebar content -->
    @include('layouts.sidebar')

    <div class="content-wrapper">
        <!-- Header content -->
        @include('layouts.header')

        <!-- Main content section -->
        <main id="main" class="main">
            @yield('content')
        </main>

        <!-- Footer content -->
        @include('layouts.footer')
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    
    <!-- Additional scripts, styles, etc. go here -->
    
    {{-- Vendor JS Files --}}
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    
    {{-- Template Main JS File --}}
    <script src="assets/js/main.js"></script>
    

</body>

</html>

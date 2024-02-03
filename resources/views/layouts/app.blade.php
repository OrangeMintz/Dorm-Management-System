<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- ======= Header ======= -->
    @include('layouts.header')

    <!-- Sidebar content -->
    @include('layouts.sidebar')

        <!-- Main content section -->
        <main id="main" class="main">
            @yield('content')
        </main>

        <!-- Footer content -->
        @include('layouts.footer')


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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hide the preloader when the page is fully loaded
        window.addEventListener('load', function () {
            document.getElementById('preloader').style.opacity = 0;
            setTimeout(function () {
                document.getElementById('preloader').style.display = 'none';
            }, 300);
        });
    });
</script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<!-- ======= Header ======= -->
@include('components.layouts.head')
<!-- End Header -->


<body>

    {{-- ======= Header ======= --}}
    @include('components.layouts.header')
    {{-- End Header --}}

    {{-- ======= Sidebar ======= --}}
    @include('components.layouts.sidebar')
    {{-- End Sidebar --}}

    <main id="main" class="main">

        <div class="pagetitle">
            <nav>
                <h1>User Management</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div>

        <div class="mt-3 mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                Add User
            </button>
        </div>
        @include('components.modals.usermodal')

        <section class="section dashboard">
            <div class="row">

                {{-- Left side columns --}}
                <div class="col-lg-12">
                    <div class="row">

                        {{-- User Table --}}
                        @include('components.tables.usertable')
                        {{-- End User Table --}}


                    </div>
                </div>
                {{-- End Left side columns --}}

            </div>
        </section>

    </main>
    {{-- End #main --}}

    {{-- ======= Footer ======= --}}
    @include('components.layouts.footer')

    {{-- End Footer --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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

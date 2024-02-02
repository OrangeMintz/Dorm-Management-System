<!DOCTYPE html>
<html lang="en">

<!-- ======= Header ======= -->
@include('layouts.head')
<!-- End Header -->


<body>

    {{-- ======= Header ======= --}}
    @include('layouts.header')
    {{-- End Header --}}

    {{-- ======= Sidebar ======= --}}
    @include('layouts.sidebar')
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

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Table with hoverable rows</h5>

                                <!-- Table with hoverable rows -->
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Birthdate</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->first_name }} {{ $user->middle_name }}
                                                    {{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td><span
                                                        class="badge rounded-pill bg-danger">{{ $user->position }}</span>
                                                </td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->birth_date }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with hoverable rows -->

                            </div>
                        </div>
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
    @include('layouts.footer')

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

<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- ======= Header ======= -->
    @include('layouts.header', ['user' => session('user')])

    <!-- Sidebar content -->
    @include('layouts.sidebar')

        <!-- Main content section -->
        <main id="main" class="main">
            @yield('content')
            <input type="text" class="form-control typeahead" name="tenant_admin" id="tenant_admin_in_tenant" required>
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

<!-- Necessary code for autocompletion in tenant admin within tenant modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script><script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        console.log('test');
        $.ajax({
            type:'get',
            url: '{!!URL::to('users/tenant_admin/get')!!}',
            success:function(response){

                var custArray = response;
                var dataCust = [];
                for (var i =0; i < custArray.length; i++){
                    name = custArray[i].first_name + " " + custArray[i].middle_name + " " + custArray[i].last_name
                    dataCust.push(name);
                }
            
                $('.typeahead').typeahead({
                    source: dataCust,
                });
            }
        })
    })
</script>

</body>

</html>

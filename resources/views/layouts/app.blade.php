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
    </main>

    <!-- Footer content -->
    @include('layouts.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Additional scripts, styles, etc. go here -->

    {{-- Vendor JS Files --}}
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide the preloader when the page is fully loaded
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.opacity = 0;
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 300);
            });
        });
    </script>

    <!-- Necessary code for autocompletion in tenant admin within add tenant modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var dataCust = [];

            //REST API to get tenant admins
            $.ajax({
                type: 'get',
                url: '{!! URL::to('users/tenant_admin/get') !!}',
                success: function(response) {

                    var custArray = response;
                    for (var i = 0; i < custArray.length; i++) {
                        name = "#" + custArray[i].id + " - " + custArray[i].first_name + " " +
                            custArray[i].middle_name + " " + custArray[i].last_name
                        dataCust.push(name);
                    }

                    $('.typeahead').typeahead({
                        source: dataCust,
                    });
                }
            })

            $('#tenant_admin_in_tenant').on('input', function() {
                var typedValue = $(this).val().trim();
                console.log(typedValue);
                if (typedValue == "") {
                    $('#tenant_admin_confirm').prop('disabled', false)
                } else {
                    $('#tenant_admin_confirm').prop('disabled', (dataCust.includes(typedValue) ? false :
                        true))
                }
            })

            $('#tenant_admin_in_tenant').change(function() {
                var typedValue = $(this).val();
                console.log(typedValue);
                $('#tenant_admin_confirm').prop('disabled', false)
            })
        })
    </script>

</body>

</html>

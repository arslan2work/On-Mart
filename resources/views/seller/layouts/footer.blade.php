<script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('backend/assets/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('backend/assets/js/shared/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('backend/assets/js/demo_1/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
    <script src="{{asset('backend/assets/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/switch-button-bootstrap/src/bootstrap-switch-button.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


    @yield('scripts')

    <script>
        setTimeout(function () {
            $('#alert').slideUp();
        },4000);
    </script>
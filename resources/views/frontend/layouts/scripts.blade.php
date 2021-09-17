     <!-- Including Jquery -->
     <script src="{{asset('frontend/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/jquery.cookie.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/wow.min.js')}}"></script>
     <!-- Including Javascript -->
     <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
     <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/lazysizes.js')}}"></script>
     <script src="{{asset('frontend/assets/js/main.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/wow.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/photoswipe.min.js')}}"></script>
     <script src="{{asset('frontend/assets/js/vendor/photoswipe-ui-default.min.js')}}"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     

     <script>
          setTimeout(function () {
               $('#alert').slideUp();
          },4000);
     </script>

     @yield('scripts')
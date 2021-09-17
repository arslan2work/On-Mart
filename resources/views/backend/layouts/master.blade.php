<!DOCTYPE html>
<html lang="en">
  <head>
      @include('backend.layouts.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('backend.layouts.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.layouts.sidebar')
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('backend.layouts.footer')
  </body>
</html>
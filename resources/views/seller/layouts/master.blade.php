<!DOCTYPE html>
<html lang="en">
  <head>
      @include('seller.layouts.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('seller.layouts.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('seller.layouts.sidebar')
        <!-- partial -->
        @yield('content')
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('seller.layouts.footer')
  </body>
</html>
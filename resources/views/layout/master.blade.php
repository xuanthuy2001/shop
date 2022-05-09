<!DOCTYPE html>
<html lang="en">

<head>
      @include('layout.head')

</head>

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
      <!-- Begin page -->
      <div class="wrapper">

            @include('layout.siderbar')


            <div class="content-page">
                  <div class="content">
                        @include('layout.topbar')
                        <div class="container-fluid">
                              @yield('content')
                        </div>

                  </div>
                  @include('layout.footer')

            </div>
      </div>



      <!-- bundle -->
      <script src="{{asset('template/assets/js/vendor.min.js')}}"></script>
      <script src="{{asset('template/assets/js/app.min.js')}}"></script>

      <!-- third party js -->
      <script src="{{asset('template/assets/js/vendor/apexcharts.min.js')}}"></script>
      <script src="{{asset('template/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
      <script src="{{asset('template/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
      <!-- third party js ends -->

      <!-- demo app -->
      <script src="{{asset('template/assets/js/pages/demo.dashboard.js')}}"></script>
      <!-- end demo js-->
</body>

</html>
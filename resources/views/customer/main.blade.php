<!DOCTYPE html>
<html lang="en">

<head>
      @include('customer.head')
</head>

<body>
      <!--  class="animsition" -->

      <!-- Header -->
      @include('customer.header')

      <!-- Cart -->


      @include('customer.cart')

      @yield('content')

      @include('customer.footer')

</body>

</html>
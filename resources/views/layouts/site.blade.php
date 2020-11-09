<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<!-- Meta Tag -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
  <title>vempraloja</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- StyleSheet -->
  @include('layouts.site-partials.styles')
  @yield('css')
</head>
  <body class="js">
    @include('layouts.site-partials.header')
    @include('layouts.site-partials.nav')
    @include('layouts.site-partials.shop')
    @include('layouts.site-partials.products-carousel')
    @include('layouts.site-partials.hot-deal')
    @include('layouts.site-partials.top-seling')
    @yield('content')
    @include('layouts.site-partials.newsletter')
    @include('layouts.site-partials.footer')
    @include('layouts.site-partials.scripts')
    @yield('javascript')
  </body>
</html>
<!doctype html>

<html>

<head>

   @include('includes.head')

</head>

<body>

<div class="container">
	<header class="row">

       @include('includes.header')
       
   	</header>

    @yield('content') <!--to exatract data from child pages where section is defined -->

   <footer class="row">

       @include('includes.footer')
       @yield('script')
      
   </footer>

</div>

</body>

</html>
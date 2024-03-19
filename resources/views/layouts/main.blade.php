
<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Revolve - Personal Magazine blog Template</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- theme meta -->
	<meta name="theme-name" content="revolve" />

	<!--Favicon-->
	<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

	<!-- THEME CSS
	================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	<!-- Themify -->
	<link rel="stylesheet" href="{{asset('plugins/themify/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/slick-carousel/slick.css')}}">
	<!-- Slick Carousel -->
	<link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/magnific-popup/magnific-popup.css')}}">
	<!-- manin stylesheet -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

	@include('layouts.navbar')

	@yield('content')


	<!-- THEME JAVASCRIPT FILES
================================================== -->
	<!-- initialize jQuery Library -->
	<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
	<!-- Bootstrap jQuery -->
	<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script>
	<!-- Owl caeousel -->
	<script src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('plugins/slick-carousel/slick.min.js')}}"></script>
	<script src="{{asset('plugins/magnific-popup/magnific-popup.js')}}"></script>
	<!-- Instagram Feed Js -->
	<script src="{{asset('plugins/instafeed-js/instafeed.min.js')}}"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
	<script src="{{asset('plugins/google-map/gmap.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('js/custom.js')}}"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>

</html>
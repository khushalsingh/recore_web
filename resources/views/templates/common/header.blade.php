<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="robots" content="all,follow">
		<meta name="googlebot" content="index,follow,snippet,archive">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Recore Talent</title>
		<meta name="keywords" content="">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
		<!-- Bootstrap and Font Awesome css -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- Css animations  -->
		<link href="{{URL::asset('assets/css/animate.css')}}" rel="stylesheet">	
		<link href="{{URL::asset('assets/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Custom stylesheet - for your changes -->
		<link href="{{URL::asset('assets/css/custom.css')}}" rel="stylesheet">
		<!-- Favicon and apple touch icons-->
		<link rel="shortcut icon" href="{{URL::asset('assets/img/fav.png')}}" type="image/x-icon" />
		<!-- owl carousel css -->
		<link href="{{URL::asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
		<link href="{{URL::asset('assets/css/owl.theme.css')}}" rel="stylesheet">
		<script>var base_url = '<?php echo url('/'); ?>';
			function refresh_captcha(t) {
				$.get(base_url + 'page/refresh_captcha', function (data) {
					$(t).parent('div').html(data + ' &nbsp; <a href="javascript:;" onclick="refresh_captcha(this);"><i class="fa fa-refresh"></i></a>');
				});
			}
		</script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src = "//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" ></script>
		<script src="{{URL::asset('assets/js/jquery.cookie.js')}}"></script>
		<script src="{{URL::asset('assets/js/waypoints.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/jquery.parallax-1.1.3.js')}}"></script>
		<!--<script src="{{URL::asset('assets/js/front.js')}}"></script> owl carousel -->
		<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
    </head>
    <body>
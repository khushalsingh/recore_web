@extends('layouts.default')
@section('content')
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="customer-orders.html" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email_modal" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_modal" placeholder="password">
                    </div>
                    <p class="text-center">
                        <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                    </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div id="carousel-example-generic" class="carousel slide" data-pause="false">
		<!-- Indicators -->
		<ol class="carousel-indicators hidden-xs">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<!-- First slide -->
			<div class="item active">
				<img src="assets/img/slider-2.jpg" class="fill">
				<div class="carousel-caption">
					<h3 class="slider-text-color unique-text" data-animation="animated bounceInLeft">
						A unique approach to finding the talent you need.
					</h3>
					<a class="btn btn-lg btn-template-transparent-primary hidden-xs"  data-animation="animated zoomInUp" id="join_us" href="register/employer">Engage Us</a>
				</div>
			</div> <!-- /.item -->
			<!-- Second slide -->
			<div class="item">
				<img src="{{URL::asset('assets/img/slider-1.jpg')}}">
				<div class="carousel-caption">
					<h3 class="slider-text-color" data-animation="animated zoomInUp">
						Human Resources, Sales and Operations Leaders.<br/>
						Your Future Starts Here.
					</h3>
					<a class="btn btn-lg btn-template-transparent-primary hidden-xs" data-animation="animated zoomInUp" id="join_us" href="register/candidate">Join Us</a>
				</div>
			</div><!-- /.item -->
		</div><!-- /.carousel-inner -->
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
    </div><!-- /.carousel -->
</div><!-- /.container -->
<section class="bar background-gray no-mb padding-big text-center-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="">What is reCore?</h2>
                <p class="lead">reCore is a Web-based platform that brings resumes to life.</p>
                <p><a class="btn btn-template-main" href="what-is-reCore">Read More</a>
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img class="img-responsive" alt="recore" src="assets/img/template-easy-customize.png">
            </div>
        </div>
    </div>
</section>
<div id="get-it">
    <div class="container">
        <div class="col-md-8 col-sm-8">
            <h3 class="text-left footer-upper">Are you a Sales, Human Resources or Operations Leader exploring your next career move?</h3>
        </div>
        <div class="col-md-4 col-sm-4">
            <a href="register/candidate" class="btn btn-template-transparent-primary  home-button-bottom">Engage Us</a>
        </div>
    </div>
</div>
<script>
	(function ($) {
		//Function to animate slider captions 
		function doAnimations(elems) {
			//Cache the animationend event in a variable
			var animEndEv = 'webkitAnimationEnd animationend';
			elems.each(function () {
				var $this = $(this),
						$animationType = $this.data('animation');
				$this.addClass($animationType).one(animEndEv, function () {
					$this.removeClass($animationType);
				});
			});
		}

		//Variables on page load 
		var $myCarousel = $('#carousel-example-generic'),
				$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

		//Initialize carousel 
		$myCarousel.carousel();

		//Animate captions in first slide on page load 
		doAnimations($firstAnimatingElems);
		//Other slides to be animated on carousel slide event 
		$myCarousel.on('slide.bs.carousel', function (e) {
			var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
			doAnimations($animatingElems);
		});

	})(jQuery);
</script>
<script>
	$(document).ready(function ()
	{
		$('.carousel').carousel({interval: 5000, pause: false});
	});
</script>
@endsection

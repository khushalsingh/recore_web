<style>
    #join_body{
		color: #7e4846;
    }
    #join-content{
		background: #fff;

		padding: 15px;
    }
    .candidate {
		background: #fff;
		border: 2px solid #7e4846;
		padding: 5px 23px;
		color: #7e4846;
    }
    .candidate:hover{
		background: #7e4846;
		border: 2px solid #7e4846;
		color: #fff;
    }
    #join-title {
		color: #7e4846;
		font-size: 30px;
		text-align: center;
    }
    .close{
		color: #7e4846;
		opacity: 20;
    }
    .close:hover{
		color: #000;
    }
    .join_header{
		padding: 0px;
    }
</style>
<div id="all">
    <header>
		<div id="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-5 contact">
						<p class="hidden-sm hidden-xs">Contact Us (678) 459-5873 or <a href="#" class="recore_info">info@recoretalent.com</a></p>
						<p class="hidden-md hidden-lg icon-color"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
						</p>
					</div>
					<div class="col-xs-7">
						<div class="social hidden-xs">
							<a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
							<a href="#" class="external linkedin" data-animate-hover="pulse"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							<a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
							<a href="mailto:info@recoretalent.com" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
						</div>
						<div class="login">
							<?php if (Auth::check()) { ?>
								<a href="<?php echo url('/my-dashboard'); ?>"><i class="fa fa-dashboard"></i><span class="hidden-xs text-uppercase">My Dashboard</span></a>
								<a href="<?php echo url('/logout'); ?>"><i class="fa fa-sign-out"></i><span class="hidden-xs text-uppercase">Sign Out</span></a>
							<?php } else { ?>
								<a href="<?php echo url('/register/employer'); ?>"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a>
								<a href="<?php echo url('/register/candidate'); ?>"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Join Our Talent Circle</span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *** TOP END *** -->
		<!-- *** NAVBAR ***_________________________________________________________ -->

		<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">
			<div class="navbar navbar-default yamm" role="navigation" id="navbar">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand home" href="<?php echo url('/'); ?>">
							<img src="{{URL::asset('assets/img/logo.png')}}" alt="logo" class="hidden-xs ">
							<img src="{{URL::asset('assets/img/logo-small.png')}}" alt="logo" class="visible-xs hidden-sm"><span class="sr-only"></span>
						</a>
						<div class="navbar-buttons">
							<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
								<span class="sr-only">Toggle navigation</span>
								<i class="fa fa-align-justify"></i>
							</button>
						</div>
					</div>
					<!--/.navbar-header -->
					<div class="navbar-collapse collapse" id="navigation">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown active">
								<a href="<?php echo url('/'); ?>">Home </a>
							</li>
							<li class="dropdown use-yamm yamm-fw">
								<a href="<?php echo url('/'); ?>/what-is-reCore">What is reCore?</a>
							</li>
							<li class="dropdown">
								<a href="<?php echo url('/'); ?>/contact-us">Contact Us</a>
							</li>
						</ul>
					</div>
					<!--/.nav-collapse -->
					<div class="collapse clearfix" id="search">
						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<!--/.nav-collapse -->
				</div>
			</div>
			<!-- /#navbar -->
		</div>
		<!-- *** NAVBAR END *** -->
    </header>
    <script>
		$(function () {
			var pgurl = window.location.href.substr(window.location.href
					.lastIndexOf("/") + 1);
			$(".navbar-nav").find(".active").removeClass("active");
			$(".nav li a").each(function () {
				if ($(this).attr("href") == base_url + '/' + pgurl || $(this).attr("href") == '')
					$(this).parent().addClass("active");
			})
		});
    </script> 
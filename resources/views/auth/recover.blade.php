@extends('layouts.default')
@section('content')
<style>
	.help-block{
		color:red !important;
	}
	.has-error .form-control {
		border-color: red !important;
	}
</style>
<div id="heading-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-7 col-xs-12">
				<h1>Forgot Password</h1>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo url('/'); ?>">Home</a></li>
					<li>Forgot Password</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="content" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 clearfix" id="customer-account">
				<p class="lead">Fill your email here.</p>
				<p class="text-muted"></p>
				<div class="box">
					<div class="row">
						<div class="col-sm-12 col-sm-offset-2 col-md-offset-3">
							<div class="heading">
								<h3 class="text-uppercase">Forgot password</h3>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div id="recover-box-msg"></div>
								</div>
							</div>
							<form role="form" method="post" id="forget_password_form" action="">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="password_old">Email</label>
											<input type="text" class="form-control" id="email" name="email">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group text-center">
											<?php
//											if (isset($captcha_image)) {
												echo captcha_img();
//											}
											?> &nbsp; 
											<!--<a href="javascript:;" onclick="refresh_captcha(this);"><i class="fa fa-refresh"></i></a>-->
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="user_captcha">Captcha Image</label>
											<input type="text" class="form-control" id="user_captcha" name="user_captcha">
										</div>
									</div>
								</div>
								<!-- /.row -->
								<div class="col-sm-offset-2 col-md-offset-2">
									<button id="user_recover_button" type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/js/plugins/md5.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/js/plugins/base64.min.js"></script>
<script>
												$(function () {
													$("#forget_password_form").validate({
														errorElement: 'span', errorClass: 'help-block',
														rules: {
															email: {
																required: true,
																email: true
															},
															user_captcha: {
																required: true,
																number: true,
//																remote: {
//																	url: base_url + "auth/captcha_validate",
//																	type: "post"
//																}
															}
														},
														messages: {
															email: {
																required: "Please enter your email address",
																email: "Email must be valid"
															},
															user_captcha: {
																required: "Please enter the secure image",
																number: "The secure image field must contain numbers only",
																remote: "Please enter correct image text"
															}
														},
														invalidHandler: function (event, validator) {
															//	show_login_error();
														},
														highlight: function (element) {
															$(element).closest('.form-group').addClass('has-error');
														},
														unhighlight: function (element) {
															$(element).closest('.form-group').removeClass('has-error');
														},
														success: function (element) {
															$(element).closest('.form-group').removeClass('has-error');
															$(element).closest('.form-group').children('span.help-block').remove();
														},
														errorPlacement: function (error, element) {
															error.appendTo(element.closest('.form-group'));
														},
														submitHandler: function (form) {
															$(".alert-danger").remove();
															$("#user_recover_button").button('loading');
															$.post('', $("#forget_password_form").serialize(), function (data) {
																if (data === '1') {
																	$("#recover-box-msg").html('<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>We have sent you an email with your new password.</div>');
																	setTimeout(function () {
																		document.location.href = base_url;
																	}, 4000);
																} else if (data === '-1') {
																	$("#recover-box-msg").html('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email does not exist.</div>');
																	setInterval(function () {
																		$(".alert-danger").fadeOut();
																	}, 5000);
																} else {
																	$("#recover-box-msg").html('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data + '</div>');
																}
																$("#user_recover_button").button('reset');
															});
														}
													});
												});

												function show_login_error() {
													$("p.login-box-msg").after('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You have entered an invalid email.</div>');
												}
</script>
@endsection
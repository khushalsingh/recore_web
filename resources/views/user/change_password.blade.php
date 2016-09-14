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
			<div class="col-md-7 col-sm-7">
				<h1>Change Password</h1>
			</div>
			<div class="col-md-5 col-sm-5">
				<ul class="breadcrumb">
					<li><a href="<?php echo url('/'); ?>">Home</a></li>
					<li>Change Password</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="content" class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 clearfix" id="customer-account">
				<p class="lead">Change your password here.</p>
				<p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
				<div class="box">
					<div class="row">
						<div class="col-sm-12 col-sm-offset-2 col-md-offset-3">
							<div class="heading">
								<h3 class="text-uppercase">Change Password</h3>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div id="change_password-box-msg"></div>
								</div>
							</div>
							<form role="form" method="post" id="change_password_form" action="">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="user_login_password">New Password</label>
											<input type="password" class="form-control" id="user_login_password" name="user_login_password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label for="user_confirm_password">Confirm New Password</label>
											<input type="password" class="form-control" id="user_confirm_password" name="user_confirm_password">
										</div>
									</div>
								</div>
								<!-- /.row -->
								<div class="col-sm-offset-2 col-md-offset-2">
									<button id="user_change_password_button" type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Change Password</button>
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
<script src="<?php echo url('/'); ?>assets/js/plugins/md5.min.js"></script>
<script src="<?php echo url('/'); ?>assets/js/plugins/base64.min.js"></script>
<script>
	$(function () {
		$("#change_password_form").validate({
			errorElement: 'span',
			errorClass: 'help-block text-right',
			rules: {
				user_login_password: {
					required: true
				},
				user_confirm_password: {
					required: true,
					minlength: 4,
					equalTo: "#user_login_password"
				}
			},
			messages: {
				user_login_password: {
					required: "Please enter new password"
				},
				user_confirm_password: {
					required: "Please re-enter new password",
					minlength: "Password must have atleast 4 characters",
					equalTo: "Password does not match"
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
				$("#user_change_password_button").button('loading');
				$.post('', $("#change_password_form").serialize(), function (data) {
					if (data === '1') {
						$("#change_password-box-msg").html('<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password Changed successfully.</div>');
						setTimeout(function () {
							document.location.href = base_url + 'my-dashboard';
						}, 4000);
					} else if (data === '-1') {
						$("#change_password-box-msg").html('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email does not exist.</div>');
						setInterval(function () {
							$(".alert-danger").fadeOut();
						}, 5000);
					} else {
						$("#change_password-box-msg").html('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data + '</div>');
					}
					$("#user_change_password_button").button('reset');
				});
			}
		});
	});

	function show_login_error() {
		$("p.login-box-msg").after('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>You have entered an invalid email.</div>');
	}
</script>
@endsection
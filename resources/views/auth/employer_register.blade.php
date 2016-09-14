@extends('layouts.default')
@section('content')
<style>
    .help-block{
        color:red !important;
    }
    .has-error .form-control {
        border-color: red !important;
    }
    .required{
        color:red;
    }
    #user_resume_div a{
        color:#267280 !important;
    }
    .spacer9 {
        border: 0 none;
        display: block;
        font-size: 0;
        height: 15px;
        margin: 0;
        padding: 0;
        width: 100%;
    }
</style>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Customer login</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="modal_login_form">
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
                <p class="text-center text-muted"><a href="<?php echo url('/'); ?>contact-us"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

            </div>
        </div>
    </div>
</div>
<!-- *** LOGIN MODAL END *** -->
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h1>New Client Registration</h1>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('/'); ?>">Home</a></li>
                    <li>New Client Registration</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="box">
                    <h2 class="text-uppercase">New account</h2>
                    <p class="lead">Not our registered employer yet?</p>
                    <p>All new clients must register with our platform in order to access Candidate Portfolios.</p>

                    <hr class="hidden-xs">
                    <form role="form" action="" id="register_form" method="post">
						<input type="hidden" id="csrftoken" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="user_company">Company <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_company" name="user_company">
                        </div>
                        <div class="form-group">
                            <label for="user_position">Position <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_position" name="user_position">
                        </div>
                        <div class="form-group">
                            <label for="user_address">Location <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_address" name="user_address">
                        </div>
                        <div class="form-group">
                            <label for="email">First Name <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_first_name" name="user_first_name">
                        </div>
                        <div class="form-group">
                            <label for="email">Last Name <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_last_name" name="user_last_name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <i class="required">*</i></label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password <i class="required">*</i></label>
                            <input type="password" class="form-control" id="user_password" name="user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_password_confirmation">Confirm Password <i class="required">*</i></label>
                            <input type="password" class="form-control" id="user_password_confirmation" name="user_password_confirmation">
                        </div>
                        <div class="form-group">
                            <label for="user_contact">Contact Number <i class="required">*</i></label>
                            <input type="text" class="form-control" id="user_contact" name="user_contact">
                        </div>
                        <br/>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-main" id="user_register_button" data-loading-text="Please wait...."><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="box">
                    <h2 class="text-uppercase">Login</h2>
                    <p class="lead">Already our Client?</p>
                    <p class="text-muted">Welcome Back!</p>
                    <hr class="hidden-xs">
                    <div class="row" id="login_success_redirect" style="display: none;">
                        <div class="col-md-10">
                            <div class="well background_white">
                                <div class="alert alert-success">Login Successful. Please Wait...</div>
                            </div>
                        </div>
                    </div>
                    <div class="login-form">
                        <form action="" method="post" id="login_form" role="form">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="user_login" name="user_login">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="user_login_password" name="user_login_password">
                            </div>
							<?php if (isset($captcha_image)) { ?>
								<div class="form-group text-center">
									<?php echo $captcha_image; ?> &nbsp; <a href="javascript:;" onclick="refresh_captcha(this);"><i class="fa fa-refresh"></i></a>
								</div>
								<div class="form-group">
									<label for="user_captcha">Image Text</label>
									<input type="text" autocomplete="off" class="form-control" placeholder="Enter Image Text" name="user_captcha" id="user_captcha" maxlength="6">
								</div>
							<?php } ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-template-main" id="user_login_button"><i class="fa fa-sign-in"></i> Log In</button>
                                <a href="<?php echo url('/'); ?>/forgot-password" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Forgot Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<div id="get-it">
    <div class="container">
        <div class="col-md-8 col-sm-9">
            <h3 class="text-left footer-upper">Do you want know more about us?</h3>
        </div>
        <div class="col-md-4 col-sm-3">
            <a href="#" class="btn btn-template-transparent-primary home-button-bottom">Join Us</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/js/plugins/md5.min.js"></script>
<script src="<?php echo url('/'); ?>/assets/js/plugins/base64.min.js"></script>
<script>
										$("#register_form").validate({
											errorElement: 'span',
											errorClass: 'help-block pull-right',
											focusInvalid: true, ignore: null,
											rules: {
												user_company: {
													required: true
												},
												user_first_name: {
													required: true
												},
												user_last_name: {
													required: true
												},
												user_position: {
													required: true
												},
												email: {
													required: true,
													email: true,
													remote: {
														url: base_url + "/validate_email",
														data: {_token: $("#csrftoken").val()},
														type: "post"
													}
												},
												user_password: {
													required: true,
													minlength: 4
												},
												user_password_confirmation: {
													required: true,
													equalTo: "#user_password"
												},
												user_address: {
													required: true
												},
												user_contact: {
													required: true,
													number: true,
													minlength: 4
												}
											},
											messages: {
												user_company: {
													required: "Please enter company name"
												},
												user_first_name: {
													required: "Please enter your first name"
												},
												user_last_name: {
													required: "Please enter your last name"
												},
												user_position: {
													required: "Please enter your position"
												},
												email: {
													required: "Please enter your email",
													email: "Email must be valid",
													remote: "Email already in use."
												},
												user_password: {
													required: "Please enter a password that is at least 4 characters long",
													minlength: "Please enter a password that is at least 4 characters long"
												},
												user_password_confirmation: {
													required: "Please enter your password again",
													equalTo: "Password's do not match"
												},
												user_address: {
													required: "Please enter location"
												},
												user_contact: {
													required: "Please enter contact number",
													number: "Contact number must be valid",
													minlength: "Contact number must have atleast 4 digits"
												}
											},
											highlight: function (element) {
												$(element).closest('.form-group').addClass('has-error');
											}, unhighlight: function (element) {
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
												$("#user_register_button").button("loading");
												$.post('', $("#register_form").serialize(), function (data) {
													if (data === '1') {
														bootbox.alert("You have registered successfully.", function () {
															document.location.href = base_url + '';
														});
													} else if (data === '0') {
														bootbox.alert("Error submitting records");
													} else {
														bootbox.alert(data);
													}
													$("#user_register_button").button("reset");
												});
											}
										});
										$("#login_form").validate({
											errorElement: 'span',
											errorClass: 'help-block text-right',
											rules: {
												user_login: {
													required: true
												},
												user_login_password: {
													required: true
												}
											},
											messages: {
												user_login: {
													required: "Please enter a valid email address"
												},
												user_login_password: {
													required: "Please enter a valid password "
												}
											},
											invalidHandler: function (event, validator) {
												//show_login_error();
											},
											highlight: function (element) {
												$(element).closest('.form-group').addClass('has-error');
											}, unhighlight: function (element) {
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
												$("#rotate-plane").css('display', 'block');
												$(".alert-danger").remove();
												$("#user_login_button").button('loading');
												$.post(base_url + '/login', {'user_login': btoa(btoa($("#user_login").val())), 'user_login_password': btoa(btoa($("#user_login_password").val()))}, function (data) {
													if (data === '1') {
														$(".login-form").hide();
														$("#login_success_redirect").fadeIn('fast');
														document.location.href = base_url + '/my-dashboard';
													} else if (/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(data)) {
														$("#user_login_form_div").hide();
														$("#login_success_redirect").fadeIn('fast');
														document.location.href = data;
													} else if (data === '-1') {
														document.location.href = '';
													} else if (data === '0') {
														show_login_error();
													} else if (data === '-2') {
														$("#user_login_password").closest('.form-group').addClass('has-error').append('<span class="help-block">The password you have entered is incorrect</span>');
													} else if (data === '-3') {
														$("#user_login").closest('.form-group').addClass('has-error').append('<span class="help-block">Please enter a valid email id.</span>');
													} else {
														bootbox.alert(data);
													}
													$("#user_login_button").button('reset');
													$("#rotate-plane").css('display', 'none');
												});
											}
										});

										function show_login_error() {
											$(".login-msg-box").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please enter a valid email and password.</div>');
											setTimeout(function () {
												$('.alert-danger').fadeOut();
											}, 3000);
										}
</script>
@endsection
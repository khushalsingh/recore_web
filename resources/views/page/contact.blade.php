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
	.contact-us-highlight{
		font-size:18px;
		font-weight: 400;
	}
</style>
<div id="heading-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-7 col-xs-12">
				<h1>Contact Us</h1>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="{{url('/')}}">Home</a></li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container" id="contact">
		<section>
			<div class="row">
				<div class="col-md-12">
					<section>
						<div class="heading">
							<h2>Connect With Us</h2>
						</div>
						<p class="lead">Feel free to reach out to us with questions, comments, suggestions and Talent Search inquiries.</p>
					</section>
				</div>
			</div>
		</section>
		<section>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="box-simple">
						<div class="icon">
							<i class="fa fa-map-marker"></i>
						</div>
						<h3>Address</h3>
						<p><strong>P.O. Box 767121 Roswell, GA 30076</strong></p>
					</div>
					<!-- /.box-simple -->
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="box-simple">
						<div class="icon">
							<i class="fa fa-envelope"></i>
						</div>
						<h3>Email</h3>
						<p class="text-muted"><strong><a href="mailto:info@recoretalent.com">info@recoretalent.com</a></strong></p>
					</div>
					<!-- /.box-simple -->
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="box-simple">
						<div class="icon">
							<i class="fa fa-phone"></i>
						</div>
						<h3>Call Us At</h3>
						<p class="text-muted"></p>
						<p><strong>(678) 459-5873</strong>
						</p>
					</div>
					<!-- /.box-simple -->
				</div>
			</div>
		</section>
		<section>
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h2>Contact Form</h2>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<form role="form" id="contact_us_feed_form" action="" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_us_feed_first_name">First Name <i class="required">*</i></label>
									<input type="text" class="form-control" id="contact_us_feed_first_name" name="contact_us_feed_first_name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_us_feed_last_name">Last Name <i class="required">*</i></label>
									<input type="text" class="form-control" id="contact_us_feed_last_name" name="contact_us_feed_last_name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_us_feed_email">Email <i class="required">*</i></label>
									<input type="text" class="form-control" id="contact_us_feed_email" name="contact_us_feed_email">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_us_feed_subject">Subject <i class="required">*</i></label>
									<input type="text" class="form-control" id="contact_us_feed_subject" name="contact_us_feed_subject">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="contact_us_feed_message">Message <i class="required">*</i></label>
									<textarea id="contact_us_feed_message" class="form-control" name="contact_us_feed_message"></textarea>
								</div>
							</div>
							<?php if (isset($captcha_image)) { ?>
								<div class="col-sm-12 ">
									<div class="form-group text-center contact-captcha">
										<?php echo $captcha_image; ?>&nbsp; <a href="javascript:;" onclick="refresh_captcha(this);"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="form-group ">
										<label for="user_captcha">Image Text <i class="required">*</i></label>
										<input type="text" class="form-control" id="user_captcha" name="user_captcha">
									</div>
								</div>
							<?php } ?>
							<div class="col-sm-12 text-center">
								<button type="submit" id="contact_us_feed_button" class="btn btn-template-main" data-loading-text="Please wait....."><i class="fa fa-envelope-o"></i> Send Message</button>
							</div>
						</div>
						<!-- /.row -->
					</form>
				</div>
			</div>
			<!-- /.row -->
		</section>
	</div>
	<!-- /#contact.container -->
</div>
<!-- /#content -->
<div id="map">
</div>
<div id="get-it">
	<div class="container">
		<div class="col-md-8 col-sm-10">
			<h3 class="text-left footer-upper">Ask about our Flat Fee Talent Search Services</h3>
		</div>
		<div class="col-md-4 col-sm-2">
			<a href="{{url('/contact-us')}}" class="btn btn-template-transparent-primary home-button-bottom">Engage Us</a>
		</div>
	</div>
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/plugins/plupload/js/plupload.full.min.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script>
											$("#contact_us_feed_form").validate({
												errorElement: 'span',
												errorClass: 'help-block pull-right',
												focusInvalid: true,
												ignore: null,
												rules: {
													contact_us_feed_first_name: {
														required: true
													},
													contact_us_feed_last_name: {
														required: true
													},
													contact_us_feed_email: {
														required: true,
														email: true
													},
													contact_us_feed_subject: {
														required: true
													},
													contact_us_feed_message: {
														required: true
													},
													user_captcha: {
														required: true,
														remote: {
															url: base_url + "auth/captcha_validate",
															type: "post"
														}
													}
												},
												messages: {
													contact_us_feed_first_name: {
														required: "Please enter first name"
													},
													contact_us_feed_last_name: {
														required: "Please enter last name"
													},
													contact_us_feed_email: {
														required: "Please enter email",
														email: "Email must be valid"
													},
													contact_us_feed_subject: {
														required: "Please enter subject"
													},
													contact_us_feed_message: {
														required: "Please enter message"
													},
													user_captcha: {
														required: "Please enter secure image text",
														remote: "Please enter correct image text"
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
													$("#contact_us_feed_button").button("loading");
													$.post(base_url + '/add_contact_feed', $("#contact_us_feed_form").serialize(), function (data) {
														if (data === '1') {
															bootbox.alert("Thank you for your valuable feedback. We will get back you soon.", function () {
																document.location.href = '';
															});
														} else if (data === '0') {
															bootbox.alert("Error submitting records");
														} else {
															bootbox.alert(data);
														}
														$("#contact_us_feed_button").button("reset");
													});
												}
											});
</script>
@endsection
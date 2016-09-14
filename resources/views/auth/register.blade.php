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
<div id="heading-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-7 col-xs-12">
				<h1>Join our Talent Circle</h1>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo url('/'); ?>">Home</a></li>
					<li>Join our Talent Circle</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="box">
					<h2>Welcome HR, Sales and Operations Leaders!</h2>
					<p>We are excited that you’ve chosen reCore Talent for your career search needs. Please
						register below to be a part of our exclusive Talent Circle. Professionals who possess at least
						a Bachelor’s degree, one year of leadership experience, and have been with their current
						organization at least 18 months will be considered. We look forward to partnering with you!</p>
					<hr class="hidden-xs">
					<form role="form" action="" id="register_form" method="post">
						<div class="form-group">
							<label for="user_first_name">First Name <i class="required">*</i></label>
							<input type="text" class="form-control" id="user_first_name" name="user_first_name">
						</div>
						<div class="form-group">
							<label for="user_last_name">Last Name <i class="required">*</i></label>
							<input type="text" class="form-control" id="user_last_name" name="user_last_name">
						</div>
						<div class="form-group">
							<label for="email">Email <i class="required">*</i></label>
							<input type="text" class="form-control" id="email" name="email">
						</div>
						<div class="form-group">
							<label for="user_address">Location <i class="required">*</i></label>
							<input type="text" class="form-control" id="user_address" name="user_address">
						</div>
						<div class="form-group">
							<label for="user_contact">Contact Number <i class="required">*</i></label>
							<input type="text" class="form-control" id="user_contact" name="user_contact">
						</div>
						<div class="spacer9"></div>
						<div class="form-group">
							<input type="hidden" name="user_resume" id="user_resume"/>
							<input type="hidden" name="user_resume_original_file" id="user_resume_original_file"/>
							<div id="resume_upload_container">
								<a title="upload resume" id="resume_uploader" href="javascript:;" class="btn upload-btn-register"><i class="fa fa-plus"></i> Upload Resume</a>
								<label for="resume">Upload Resume (pdf,doc,docx 25MB max ) <i class="required">*</i></label>
								<br/>
								<div id="user_resume_div"></div>
							</div>
						</div>
						<br/>
						<div class="text-center">
							<button type="submit" class="btn btn-template-main" id="user_register_button" data-loading-text="Please wait...."><i class="fa fa-user-md"></i> Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo url('/'); ?>/assets/js/plugins/plupload/js/plupload.full.min.js"></script>
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
			user_first_name: {
				required: true
			},
			user_last_name: {
				required: true
			},
			email: {
				required: true,
				email: true,
				remote: {
					url: "<?php echo url('/'); ?>/validate_email",
					type: "post"
				}
			},
			user_address: {
				required: true
			},
			user_contact: {
				required: true,
				number: true,
				minlength: 4
			},
			user_resume: {
				required: true
			}
		}, messages: {
			user_first_name: {
				required: "Please enter your first name"
			},
			user_last_name: {
				required: "Please enter your last name"
			},
			email: {
				required: "Please enter your email",
				email: "Email must be valid",
				remote: "Email already in use."
			},
			user_address: {
				required: "Please enter location"
			},
			user_contact: {
				required: "Please enter contact number",
				number: "Contact number must be valid",
				minlength: "Contact number must have atleast 4 digits"
			},
			user_resume: {
				required: "Please upload resume"
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
					bootbox.alert("You have registered successfully. An verification email has been sent to your registered email.", function () {
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

	function show_login_error() {
		$(".login-msg-box").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Please enter a valid email and password.</div>');
		setTimeout(function () {
			$('.alert-danger').fadeOut();
		}, 3000);
	}
	var resume_uploader = new plupload.Uploader({
		runtimes: 'html5,flash,html4',
		browse_button: "resume_uploader",
		container: "resume_upload_container",
		url: "<?php echo url('/'); ?>/upload_files",
		chunk_size: '1mb',
		unique_names: true,
		flash_swf_url: "<?php echo url('/'); ?>/assets/js/plugins/plupload/js/Moxie.swf",
		silverlight_xap_url: "<?php echo url('/'); ?>/assets/js/plugins/plupload/js/Moxie.xap", filters: {max_file_size: '26mb',
			mime_types: [
				{title: "Document files", extensions: "pdf,doc,docx"}]
		}, init: {
			FilesAdded: function (up, files) {
				if (up.files.length > 1) {
					resume_uploader.removeFile(resume_uploader.files[0]);
				}
				setTimeout(function () {
					up.start();
					$(window).block({message: 'Please wait...'});
				}, 1);
			},
			FileUploaded: function (up, file) {
				var file_extension_array = file.target_name.split('.');
				var file_extension = file_extension_array[file_extension_array.length - 1];
				var file_icon = '';
				switch (file_extension) {
					case 'pdf':
						var file_icon = 'fa-file-pdf-o';
						break;
					case 'doc':
					case 'docx':
						var file_icon = 'fa-file-word-o';
						break;
					default :
						var file_icon = 'fa-file-word-o';
						break;
				}
				$("#user_resume").val(file.target_name);
				$("#user_resume_original_file").val(file.name);
				$("#user_resume_div").html('<div class="text-center"><a href = "<?php echo url('/'); ?>/uploads/' + file.target_name + '" target = "_blank" title="Click Here"><i class="fa ' + file_icon + ' fa-3x"></i><br/><span>' + file.name + '</span></a></div>');
			},
			UploadComplete: function () {
				$(window).unblock();
			},
			Error: function (up, err) {
				$(window).unblock();
				bootbox.alert(err.message);
			}
		}
	});
	resume_uploader.init();
</script>
@endsection
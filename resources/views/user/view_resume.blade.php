@extends('layouts.default')
@section('content')
<style>
    .well-white  {
        border: 1px solid #ddd;
        box-shadow: 1px 2px 3px 0 rgba(86, 86, 86, 0.75);
        float: left;
        margin-top: 15px;
        margin-bottom: 15px;
        width: 100%;
        background-color: #fff;
    }
    .well-white > h2 {
        font-size: 18px;
        font-weight: 500;
        margin: 0;
    }
    .well-white.user {
        background: #eee none repeat scroll 0 0;
        box-shadow: none;
    }
    .well-white > h3 {
        font-size: 17px;
        font-weight: 400;
        margin: 5px 0;
    }

    .my_talent > li {
        list-style: outside none none;
        padding: 9px;
    }
    .bg-in-pages {
        background: #fff none repeat scroll 0 0;
        padding: 70px 0 0;
    }
    .my_talent > li:nth-child(1) {
        font-size: 17px;
        font-weight: bold;
    }
    .detail {
        background-color: #38a7bb;
        color: #fff;
        font-size: 16px;
        margin: 0;
        padding: 10px 15px;
    }

    .personal_detail {
        padding: 0 15px;
        margin: 0px;
    }
    .personal_detail > li {
        list-style: outside none none;
        padding: 5px;

    }

    .personal_detail > li label {
        width: 50%;
        font-weight: bold;
    }
    .personal_detail span {
        color: #7d7d7d;
    }
    .skill-block label{
        width:100% !important;
    }
    .my_talent {
        padding: 0 15px;
    }

    *::after, *::before {
        box-sizing: border-box;
    }
    *::after, *::before {
        box-sizing: border-box;
    }
    .icon {
        border: none!important;
        color: #fff;
        display: inline-block;
        font-size: 20px;
        height: 20px;
        line-height: 80px;
        margin-right: 7px;
        width: 20px;
    }
	.bottom {
		border: 1px solid #dddddd;
		margin: 14px 0;
		width:100%
	}

</style>
<div class="bg-in-pages">
    <div class="well-white user">
        <div class="container">
            <ul class="my_talent">
                <li><?php echo $user_talent_array->user_talent_first_name; ?> <?php echo $user_talent_array->user_talent_last_name; ?></li>
                <li><?php echo $user_talent_array->user_talent_current_position; ?> (<?php
					switch ($user_talent_array->user_talent_level_of_experience) {
						case'1':
							echo 'High Potentials';
							break;
						case '2':
							echo 'Mid Level';
							break;
						case '3':
							echo 'Senior Level';
							break;
						default:
							echo 'High Potentials';
					}
					?>)</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-6">
            </div>
            <div class="col-md-12 outer_detail col-sm-12">
                <div class="well-white">
                    <h2 class="detail">
                        <!-- Details Popup icon by Icons8 -->
                        <img class="icon icons8-Details-Popup" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABFElEQVR4nO3Uy27CMBQAUb4SUKsi2NBNge9HAYYFWVRRHiSOc111RmKDrfj6KMpqZWZmZmbWG38sAQQQIC/A7AckJoAAAggggAACxAMM7Wuujy11vskJIIAAeQ9ITAABBCgDYGhfc31sqfNNTgABBMh7QGICCCBAGQBD+5rrY0udb3ICCCBA3gMSE0AAAQQQQAABlgOY0BX4euOcXb03qRIBAB7AT88Zp3pPcqUCwOuCp5bnn5np8lA2ALwuev717AszXh4K+0YBB+DegnDpuPwdOETPPWvAd8tFHx3/HaPnzRKwBaqeN7cCttFzZg3YdCBUwCZ6vkUC1g2EClhHz7Vo9YfxVv/20fOEBHwCH9FzmP3jnqq3M5pBNPElAAAAAElFTkSuQmCC" width="20" height="20">Personal Detail</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="personal_detail">
                                <li> <label class="">Name </label>
                                    <span><?php echo $user_talent_array->user_talent_first_name . ' ' . $user_talent_array->user_talent_last_name; ?></span>
                                </li>

                                <li><label class="">Category</label>
                                    <span><?php echo $user_talent_array->talent_category_name; ?></span>
                                </li>
                                <li class="video-size"><label style="vertical-align:top">Video Resume</label>
                                    <span>
										<?php
										if ($user_talent_array->user_talent_video_link !== '') {
											$qr = parse_str(parse_url($user_talent_array->user_talent_video_link, PHP_URL_QUERY), $y_array);
											?>
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" width="315" height="225" frameborder="0" src="//www.youtube.com/embed/<?php echo $y_array['v']; ?>?frameborder=0" allowfullscreen=""></iframe>
											</div>
											<?php
										} else {
											echo 'N/A';
										}
										?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="personal_detail">
                                <li><label class="">Work Style Assessment Link</label>
                                    <span><?php if ($user_talent_array->user_talent_work_style_assessment !== '') { ?><a href="<?php echo $user_talent_array->user_talent_work_style_assessment; ?>" target="_blank">Click to View</a><?php
										} else {
											echo 'N/A';
										}
										?></span>
                                </li>
                                <li><label style="vertical-align:top">Image</label>
                                    <span>
										<?php if (is_file(public_path() . '/uploads/talents/images/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array->user_talent_created)) . $user_talent_array->user_talent_image)) { ?>
											<img src="<?php echo url('/') . '/uploads/talents/images/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array->user_talent_created)) . $user_talent_array->user_talent_image; ?>"/>
											<?php
										} else {
											echo 'No Image';
										}
										?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-12 outer_detail col-sm-12">
                <div class="well-white">
                    <h2 class="detail"><!-- Student Male icon by Icons8 -->
                        <!-- Graduation Cap icon by Icons8 -->
                        <img class="icon icons8-Graduation-Cap" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAD6ElEQVR4nO3az28VVRjGcSAUrC0YRatVJBg0LQs2LEA2LJQILlwpiStZWDQQjVEXQIyEFVEjKzbyDxiLoCzUDcYNGBbij5DQjYmS1Er4UaQSG0Daj4s5DdPrzJle79xOI/NNZnPnnPd53vfOnJn33DtvXk1NTU1NTU1NzeyDpVhatY9ZB93Yg9Fw7EFX1b7aTvjG94WkGxkN5/5/VwQ6sQuXMhJv5FIY21m175bBYryB4Rkk3shwmLu46jyaBvPxAs5GEryKveEYi4w7i+cxv+q8CgmJb8VQQeK70J2a1x0+uxqZNxRiz81CBHNnIgmM4z0si8RYFsaMR+KcwdbZzC0KnsapiOHrIakHmojZE+Zcj8Q9hafamVuRyY04GTH4Nw5hRQsaK0KMWxGdk9hYZm5FptbieMTQJA6jv0TN1SHmZET3ONaWpZllom8GJg5jTRs9rAkaRcXvK1N0VQg6ERH+BhtKEy32tCFo5jERPK9qReQRyf13MyL0HTaVmFuzHjcFD3ncDDk83EzQh8KkG5HAP1WZeBrJu8dzwVMeN0JOD8YCdUm6siuRQMN4FR2ROD14BjvwPgbxNU7jZ1wMGlnHhTDmdJgzGGLsCDF7IrodwdtvEf9XsFu688QivI7zkYkX8SbuyhBeju04ipFIjLIYCVrbsTzDTyfeCp7zOI/XsCj9GhqbcC4IdqSEtuAr8cWx3UzgS2xuuBJekXjO47Lkau9OV64LbxcI/oIBfNKy9fL5WOLt18iYUbyDJbG1oFXGcEKy6LyLl7AZ69EvWWTvzTl6w5j1Yc62EONQiBnrGos87cM9uYlHCvBnQfBb+EKyUPVpY7cmWfH7sDNoxl6R4Rr2475mRBq5Hx/grxyRle1KeAZeH8vxNI4DIk+NWNBppD7vxcG881WRkfxB9JYWsNnzs03pfuoC1AWoC9BSART3AheU2AtUXgBJLzBg9nuBgaA9jSoKMKeoCzAHCtDYC2wzvRfoVdwLPOl2L7BXE71AVQX4XtKD92t/L7Ba0rX+UFUBfm8YMinZm58qwIKWTeR7W5AqwLf+vUM9UoZIUQEO5FwFU4zjR8kjbD9eln0LLEzFXCj7FhgIMQZDzNhPZvBhq8lndVcrG8bcjWMFRqrgc638pwBPyN4QvYzHM8Y/a+5siW35z4mnEvosInQkMi+9KRrbhyuLcyKboq0U4I+I6GgTcZZgHV6UbEF/JLllTkh+4596FU5fORNuvwoPhbHHwtzdIdY6sb28EgpwLVKAsbYJzxXEF7ZPq/bXdiSPn6xFcBSPVu1vVpD8IeGoZCd4DEfumORrampqampqampqau4o/gGT6j+AH2GfQAAAAABJRU5ErkJggg==" width="20" height="20">Qualifications</h2>
					<?php
					if (count($user_talent_array->user_talent_qualification_array) > 0) {
						foreach ($user_talent_array->user_talent_qualification_array as $key => $qualifications) {
							?>
							<div class="row">
								<div class="col-md-6">
									<ul class="personal_detail">
										<li> <label class="">Degree</label>
											<span><?php echo $qualifications->qualification_name; ?> (<?php echo $qualifications->course_name; ?>)</span>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="personal_detail">
										<li> <label class="">School</label>
											<span><?php echo $qualifications->user_talent_qualification_school; ?></span>
										</li>
									</ul>                       
								</div>
							</div>
							<?php
							if ($key !== count($user_talent_array->user_talent_qualification_array) - 1) {
								echo '<hr/>';
							}
						}
					} else {
						echo '<ul class="personal_detail"><li class="skill-block"><label><span>No 
                                Qualification Added.</span></label></li></ul>';
					}
					?>
                </div>
            </div>
            <div class="col-md-12 outer_detail col-sm-12">
                <div class="well-white">
                    <h2 class="detail">
                        <!-- Resume icon by Icons8 -->
                        <img class="icon icons8-Resume" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABLklEQVR4nO3SS0oDQRRA0Yx0BzrRVsG9CS5MBxIHugIJ6mLUoA4zuU4iSBHr059Ud3MvZFRNvVeHLBZmZmbJmFgCCCDAsAC9D+iYAAIIIIAAYwEAGmAJvG1/98Blyf2puuzXqtwB28evd+y8Bk5z758ywDKy913u/VMG+I7s/Zl7/5QBvtoA7Gu/wQcAtxGAm94XK9xv8AHAGbDZ8fgN0PS+WOF+gw4AjoFV5B/wBBz1vlzmfoMOAA6B18jjf3sGDlL3pxojwHXB/ldzBHgJPnkAzoEL4DE4W80R4CP45OTPWROcvc8OoHYCCCCAAAIIIEA9gPC8tNL7BBBAgHEB1E4AAQSoCxCe/1fbeaXzu743uVDpwgIIMHOA2gkggAACCLBPgLEngAACmJmZJfoBHcu1w61fvsEAAAAASUVORK5CYII=" width="20" height="20">Experiences</h2>
					<?php
					if (count($user_talent_array->user_talent_experience_array) > 0) {
						foreach ($user_talent_array->user_talent_experience_array as $key => $experience) {
							?>
							<div class="row">
								<div class="col-md-6">
									<ul class="personal_detail">
										<li> <label class="">Company</label>
											<span><?php echo $experience->user_talent_experience_company; ?></span>
										</li>
										<li> <label class="">Role</label>
											<span><?php echo $experience->user_talent_experience_role; ?></span>
										</li>
									</ul>                       
								</div>
								<div class="col-md-6"> 
									<ul class="personal_detail"><li> <label class="">Time in Current Role</label>
											<span><?php echo $experience->user_talent_experience_years; ?></span>
										</li>
									</ul>
								</div> 
							</div>

							<?php
							if ($key !== count($user_talent_array->user_talent_experience_array) - 1) {
								echo '<hr/>';
							}
						}
					} else {
						echo '<ul class="personal_detail"><li class="skill-block"><label><span>No Experience Added.</span></label></li></ul>';
					}
					?>
                </div>
            </div>
            <div class="col-md-12 outer_detail col-sm-12">
                <div class="well-white">
                    <h2 class="detail">
                        <!-- Tasks Filled icon by Icons8 -->
                        <!-- Tasks icon by Icons8 -->
                        <img class="icon icons8-Tasks" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAyUlEQVRoge2WSw6DMAxEuf+RKlWoysGGTRcoOB8XbNfKvKWjBJ40gdk2QghJCYAX8vGWRFLSE/kIa6W5MYihiHpjENMiAHacMphZpJxjllZEu+7NzGW/fNK+MUsnkgpJpAx3/R+XXwUhZADYfmPpibTar/VcfrEGQ5HZg57GTARV+7WeW4p4xOnndr1OtDzjVM0fF0mFJML2S8gKgO03lp5ISJvVMhQxf5D1+fUCnNusFo2Ia5vVsk607sSpmoeLpEISYfslhBA3DlJlUHsPLDYMAAAAAElFTkSuQmCC" width="20" height="20">Skills</h2>
                    <ul class="personal_detail">
                        <li class="skill-block"><label><span> 
									<?php
									$skill_array = array();
									if (count($user_talent_array->user_talent_skill_array) > 0) {
										foreach ($user_talent_array->user_talent_skill_array as $skill) {
											$skill_array[] = $skill->skill_name;
										}
										echo implode(' , ', $skill_array);
									} else {
										echo '<ul class="personal_detail"><li class="skill-block"><label><span>No Skill Added.</span></label></li></ul>';
									}
									?></span></label>
                        </li>
                    </ul>   
                </div>
            </div>
            <div class="col-md-12 outer_detail col-sm-12">
                <div class="well-white">

                    <h2 class="detail">
                        <!-- Self Service Kiosk icon by Icons8 -->
                        <img class="icon icons8-Self-Service-Kiosk" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAoElEQVR4nO3QQQqDQBBEUY8SYq6enC7EI1Q2WYmCMNOagffBlUPRvGmSJEnaKYMHAACAvgDNg8UBAAAAAAAAAAAAAAAAAAAAAAD832BxAAAAAAAAQCHAaAEAAKAvQPNgcQAAADgXYP3/aGftAAAAoBZg9faR5LNx5zvJ3HxM53tLBpPck7ySLL/vmeTWfMjBLge4OgDVAKMFAAAASZKkzb4VoWUAJ3mu/wAAAABJRU5ErkJggg==" width="20" height="20">Desired Compensation</h2>
                    <ul class="personal_detail">
                        <li class="skill-block"><label><span> 
									<?php
									$skill_array = array();
									if (count($user_talent_array->user_talent_service_array) > 0) {
										foreach ($user_talent_array->user_talent_service_array as $skill) {
											$skill_array[] = $skill->service_name;
										}
										echo implode(' , ', $skill_array);
									} else {
										echo '<ul class="personal_detail"><li class="skill-block"><label><span>No Desired Compensation.</span></label></li></ul>';
									}
									?></span></label>
                        </li>
                    </ul>   
                </div>
            </div>
        </div>
		<hr class="bottom">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group text-center">
					<?php if (is_file(public_path() . '/uploads/talents/resumes/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array->user_talent_created)) . $user_talent_array->user_talent_resume)) { ?>
						<a class="btn btn-template-main" id="resume_button_link" href="<?php echo url('/'); ?>/uploads/talents/resumes/<?php echo date('Y/m/d/H/i/s/', strtotime($user_talent_array->user_talent_created)) . $user_talent_array->user_talent_resume; ?>" target="_blank"><i class="fa fa-eye"></i> View/Download Resume</a>
					<?php } ?>
					<button type="submit" class="btn btn-template-main" id="resume_button" data-loading-text="Please wait...." data-toggle="modal" data-target="#talent_network_modal"><i class="fa fa-users"></i> Add to My Talent Network</button>
					<button type="submit" class="btn btn-template-main" id="shedule_interview_button" data-loading-text="Please wait...."><i class="fa fa-calendar"></i> Schedule Interview</button>
				</div>
			</div>
		</div> 
	</div>
</div>
<!-- Modal -->
<div id="talent_network_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Resume to My Talent Network</h4>
			</div>
			<div class="modal-body">
				<form id="talent_network_form" method="post" action="">
					<div class="form-group">
						<label>Add Comment</label>
						<textarea name="user_talent_network_comment" id="user_talent_network_comment" class="form-control"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-default" id="add_talent_network">Submit</button>
			</div>
		</div>

	</div>
</div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script>
	$("#add_talent_network").click(function () {
		$(window).block({message: 'Please wait...'});
		$.post('', {user_talent_network_comment: $("#user_talent_network_comment").val()}, function (data) {
			if (data === '1') {
				bootbox.alert('Added to My Talent Network', function () {
					document.location.href = '';
				});
			} else if (data === '0') {
				bootbox.alert('Error, Please try again.');
			} else {
				bootbox.alert(data, function () {
					document.location.href = '';
				});
			}
			$(window).unblock();
		});
	});

//	$("#shedule_interview_button").click(function () {
//		$(window).block({message: ' <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i><br>Please wait...'});
//		$.post(base_url + 'user/schedule_interview', {user_talent_id:<?php //echo $user_talent_array->user_talent_id; ?>}, function (data) {
//			if (data === '1') {
//				bootbox.alert("An email has been sent to admin to schedule interview. Please wait for update. Thank you.", function () {
//					document.location.href = '';
//				});
//			} else if (data === '0') {
//				bootbox.alert('Error, Please try again.');
//			} else {
//				bootbox.alert(data);
//			}
//			$(window).unblock();
//		});
//	});

</script>
@endsection
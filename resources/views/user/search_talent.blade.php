@extends('layouts.default')
@section('content')
<style>
    .help-block{
        color:red !important;
    }
    .has-error .form-control {
        border-color: red !important;
    }
    .data-info{
        font-size:25px !important;
        margin-top:20px;
        margin-bottom: 65px;
    }
</style>
<style>
    .btn-select {
        position: relative;
        padding: 0;
        min-width: 236px;
        width: 100%;
        border-radius: 0;
        margin-bottom: 20px;
    }

    .btn-select .btn-select-value {
        padding: 6px 12px;
        display: block;
        position: absolute;
        left: 0;
        right: 34px;
        text-align: left;
        text-overflow: ellipsis;
        overflow: hidden;
        border-top: none !important;
        border-bottom: none !important;
        border-left: none !important;
    }
    #hr_level{
        background-color: #7e4846;

    }
    .btn-select .btn-select-arrow {
        float: right;
        line-height: 20px;
        padding: 6px 10px;
        top: 0;
    }

    .btn-select ul {
        display: none;
        background-color: white;
        color: black;
        clear: both;
        list-style: none;
        padding: 0;
        margin: 0;
        border-top: none !important;
        position: absolute;
        left: -1px;
        right: -1px;
        top: 33px;
        z-index: 999;
    }

    .btn-select ul li {
        padding: 3px 6px;
        text-align: left;
    }



    .btn-select ul li.selected {
        color: white;
    }


    .btn-select.btn-success ul li.selected {
        background-color: #7e4846;
        color: white;
    }

    .btn-select.btn-success ul {
        border: #7e4846 1px solid;
    }
    .disc.clearfix{
        margin: 0px;
    }
    .job-dtl.clearfix{
        margin: 0px;
    }

    .btn-select.btn-success .btn-select-value {
        background-color: #fff;
        border: #7e4846 1px solid;
        color: #000;
    }

    #hr_level:hover{
        border: #7e4846 1px solid;
    }
    .well-white {
        border: 1px solid #ddd;
        box-shadow:  1px 2px 3px 0 rgba(86, 86, 86, 0.75);
        float: left;
        margin-top: 15px;
        padding: 15px;
        margin-bottom: 15px;
        width:100%;
    }
    .well-white > a {
        color: #cd4200;
        font-size: 18px;
        font-weight: 500;
        margin: 0;
    }
    .well-white > h3 {
        font-size: 17px;
        font-weight: 400;
        margin: 5px 0;
    }
    .joblist-lhs {
        float: left;
        padding-right: 15px;
        width: 100%;
    }
    .clearfix::after {
        clear: both;
        content: " ";
        display: block;
        font-size: 0;
        height: 0;
        visibility: hidden;
    }
    .job-dtl li {
        color: #7d7d7d;
        margin-bottom: 10px;
    }
    .job-dtl li label {
        color: #000;
        float: left;
        font-size: 12px;
        margin-right: 10px;
        padding-right: 12px;
        text-transform: uppercase;
    }
    .job-dtl li .srp-skills, .job-dtl li .job-snippet-bx {
        box-sizing: border-box;
        display: inline-block;
        float: left;
        position: relative;
        width: 89%;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        border-color: #fff transparent transparent!important;
    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #7e4846!important;
    }
    .job-dtl.clearfix{
        padding: 0px;
    }
    .select2-selection__arrow{
        background-color: #7e4846;
        color: #fff;
    }
    .disc.clearfix{
        list-style: none;
    }
    .srp-tag {
        border-radius: 2px;
        background-color: #fff;
        border: solid 1px #e4e4e4;
        color: #7d7d7d;
        padding: 2px 3px;
        font-size: 12px;
        margin: 0 3px 3px 0;
        display: inline-block;
    }
    .srp-tag {
        color: #38a7bb;
        font-size: 14px;
    }
    .list_border{
        margin: 10px 0px;
        width: 100%;
        float: left;
    }
    .text-info{
        font-size: 18px;
    }

</style>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2><?php echo $talent_category_array->talent_category_name; ?> Available</h2>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('/'); ?>">Home</a></li>
                    <li><a href="<?php echo url('/'); ?>/my-dashboard">Dashboard</a></li>
                    <li><?php echo $talent_category_array->talent_category_name; ?> Available</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <select data-placeholder="Level of Experience" id="level_of_experience" name="level_of_experience">
                            <option></option>
                            <option value="1" <?php echo Request::segment(3) === '1' ? 'selected="selected"' : ''; ?>>Hight Potential (3 - 5 Years)</option>
                            <option value="2" <?php echo Request::segment(3) === '2' ? 'selected="selected"' : ''; ?>>Mid Level (5 - 10 Years)</option>
                            <option value="3" <?php echo Request::segment(3) === '3' ? 'selected="selected"' : ''; ?>>Senior Level (10 - 15 Years)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
	<?php if (isset($user_talent_array) && count($user_talent_array) > 0) { ?>
		<div class="container">
			<?php foreach ($user_talent_array as $talent) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="well-white">
							<a href="<?php echo url('/'); ?>/user/view-resume/<?php echo $talent->user_talent_id; ?>" target="_blank"><?php echo $talent->user_talent_first_name . ' ' . $talent->user_talent_last_name; ?> (<?php echo $talent->user_talent_current_position; ?>)</a>
							<h3><?php
								switch ($talent->user_talent_level_of_experience) {
									case'1':
										echo 'High Potentials (3 - 5 Years)';
										break;
									case '2':
										echo 'Mid Level (5 - 10 Years)';
										break;
									case '3':
										echo 'Senior Level (10 - 15 Years)';
										break;
									default:
										echo 'High Potentials (3 - 5 Years)';
								}
								?></h3>
							<hr class="list_border">
							<div class="joblist-lhs">
								<ul class="job-dtl clearfix">
									<li class="disc clearfix">
										<label>Key Skills</label>
										<span class="srp-skills">   
											<?php
											if (count($talent->user_talent_skill_array) > 0) {
												$talent_skill_array = array();
												foreach ($talent->user_talent_skill_array as $skills) {
													?>
													<span class="srp-tag">
														<?php echo $skills->skill_name; ?> 
													</span>
													<?php
												}
											}
											?>
										</span>
									</li>
								</ul>
							</div>
							<hr class="list_border">
						</div>
					</div>
				</div><?php } ?>        
			<div class="row">
				<div class="text-center">
					<?php // echo $page_links;  ?>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="container">
			<div class="row">
				<div class="well-white">
					<span class="text-info text-center">No Records Found!</span>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
	$(document).ready(function () {
		$('select').select2({allowClear: true});
	});
	$('#level_of_experience').on('change', function () {
		document.location.href = base_url + "/search-talent/<?php echo $talent_category_array->talent_category_slug; ?>/" + $(this).val();
	});
</script>
@endsection
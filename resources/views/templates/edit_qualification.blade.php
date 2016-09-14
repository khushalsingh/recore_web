<?php
if (count($user_talent_array['user_talent_qualification_array']) > 0) {
	foreach ($user_talent_array['user_talent_qualification_array'] as $key => $qualifications) {
		?>
		<div class="clone_component_1">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="qualification">Qualification</h4>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6 qualification-div">
						<div class="form-group">
							<label for="qualifications_id" class="col-sm-3 control-label">Degree</label>
							<div class="col-sm-9">
								<select id="qualifications_id<?php echo $key; ?>" name="qualifications_id[]" class="form-control talent-qualification" data-placeholder="Degree">
									<option></option>
									<?php foreach ($qualification_array as $qualification) { ?>
										<option value="<?php echo $qualification['qualification_id']; ?>" <?php echo $qualification['qualification_id'] === $qualifications['qualifications_id'] ? 'selected="selected"' : ''; ?>>
											<?php echo $qualification['qualification_name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-sm-6 course-div">
						<div class="form-group">
							<label for="courses_id" class="col-sm-3 control-label">Course</label>
							<div class="col-sm-9">
								<select id="courses_id<?php echo $key; ?>" name="courses_id[]" class="form-control talent-course" data-placeholder="Course">
									<option></option>
									<?php foreach ($qualifications['course_details'] as $course) { ?>
										<option value="<?php echo $course['course_id']; ?>" <?php echo $course['course_id'] === $qualifications['courses_id'] ? 'selected="selected"' : ''; ?>><?php echo $course['course_name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="user_talent_qualification_year" class="col-sm-3 control-label">School</label>
							<div class="col-sm-9">
								<input type="text" name="user_talent_qualification_school[]" id="user_talent_qualification_school" class="form-control" placeholder="School" value="<?php echo $qualifications['user_talent_qualification_school']; ?>"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<?php if ($key == count($user_talent_array['user_talent_qualification_array']) - 1) { ?>
					<a class="clone_component_button_1" href="javascript:;" onclick="clone_component(this, 1);"><i class="fa fa-plus-circle"></i> Add a Qualification</a>
				<?php } else { ?>
					<a class="clone_component_button_1" href="javascript:;" onclick="clone_component(this, 1);" style="display: none"><i class="fa fa-plus-circle"></i> Add a Qualification</a>
				<?php } ?>
				<?php if (count($user_talent_array['user_talent_qualification_array']) === 1) { ?>
					<a class="remove_component_button_1" href="javascript:;" onclick="remove_component(this, 1);" style="display:none"><i class="fa fa-minus-circle"></i> Remove</a>
				<?php } else { ?>
					<a class="remove_component_button_1" href="javascript:;" onclick="remove_component(this, 1);"><i class="fa fa-minus-circle"></i> Remove</a>
				<?php } ?>
			</div>
		</div>
		<hr/>
		<?php
	}
} else {
	?>
	<div class="clone_component_1">
		<div class="row">
			<div class="col-sm-12">
				<h4 class="qualification">Qualification</h4>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 qualification-div">
					<div class="form-group">
						<label for="qualifications_id" class="col-sm-3 control-label">Degree</label>
						<div class="col-sm-9">
							<select id="qualifications_id0" name="qualifications_id[]" class="form-control talent-qualification" data-placeholder="Degree">
								<option></option>
								<?php foreach ($qualification_array as $qualification) { ?>
									<option value="<?php echo $qualification['qualification_id']; ?>">
										<?php echo $qualification['qualification_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-6 course-div">
					<div class="form-group">
						<label for="courses_id" class="col-sm-3 control-label">Course</label>
						<div class="col-sm-9">
							<select id="courses_id0" name="courses_id[]" class="form-control talent-course" data-placeholder="Course">
								<option></option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="user_talent_qualification_year" class="col-sm-3 control-label">School</label>
						<div class="col-sm-9">
							<input type="text" name="user_talent_qualification_school[]" id="user_talent_qualification_school" class="form-control" placeholder="School"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-right">
			<a class="clone_component_button_1" href="javascript:;" onclick="clone_component(this, 1);"><i class="fa fa-plus-circle"></i> Add a Qualification</a>
			<a class="remove_component_button_1" href="javascript:;" onclick="remove_component(this, 1);" style="display: none;"><i class="fa fa-minus-circle"></i> Remove</a>
		</div>
	</div>
	<hr/>
<?php } ?>
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">		
                <h4 class="qualification col-sm-2">Skills</h4>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select name="skills_id[]" class="form-control" id="skills_id" data-placeholder="Skills" multiple="">
                            <option></option>
							<?php
							foreach ($skill_array as $skill) {
								$selected = false;
								foreach ($user_talent_array['user_talent_skill_array'] as $talent_skill) {
									if ($talent_skill['skills_id'] === $skill['skill_id']) {
										$selected = true;
									}
								}
								?>
								<option value="<?php echo $skill['skill_id']; ?>" <?php echo $selected ? 'selected="selected"' : ''; ?>><?php echo $skill['skill_name']; ?></option>
							<?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
<?php $this->load->view('templates/edit_experience'); ?>
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">		
                <h4 class="qualification col-sm-2">Desired Compensation</h4>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select name="services_id[]" class="form-control" id="services_id" data-placeholder="Desired Compensation" multiple="">
                            <option></option>
							<?php
							foreach ($service_array as $service) {
								$selected = false;
								foreach ($user_talent_array['user_talent_service_array'] as $talent_service) {
									if ($talent_service['services_id'] === $service['service_id']) {
										$selected = true;
									}
								}
								?>
								<option value="<?php echo $service['service_id']; ?>" <?php echo $selected ? 'selected="selected"' : ''; ?>><?php echo $service['service_name']; ?></option>
							<?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
<style>
    .qualification {
        font-size: 24px;
        font-weight: bold;
        /*padding-left: 10px;*/
    }
</style>


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
								<option value="<?php echo $qualification->qualification_id; ?>">
									<?php echo $qualification->qualification_name; ?></option>
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
<div class="form-group">
    <div class="row">
		<div class="col-sm-12">
			<div class="row">		
				<h4 class="qualification col-sm-2">Skills</h4>
				<div class="col-sm-10">
					<div class="form-group">
						<select name="skills_id[]" class="form-control" id="skills_id" data-placeholder="Skills" multiple="">
							<option></option>
							<?php foreach ($skill_array as $skill) { ?>
								<option value="<?php echo $skill->skill_id; ?>"><?php echo $skill->skill_name; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<hr/>
<div class="clone_component_2">
    <div class="row">
		<div class="col-sm-12">
			<h4 class="qualification">Experiences</h4>
		</div>
    </div>
    <div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="user_talent_experience_company" class="col-sm-3 control-label">Organizations</label>
					<div class="col-sm-9">
						<input type="text" placeholder="Organization" class="form-control" id="user_talent_experience_company" name="user_talent_experience_company[]">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label for="user_talent_experience_role" class="col-sm-3 control-label">Role</label>
					<div class="col-sm-9">
						<input type="text" placeholder="Role" class="form-control" id="user_talent_experience_role" name="user_talent_experience_role[]">
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="user_talent_experience_years" class="col-sm-3 control-label">Time in Current Role</label>
					<div class="col-sm-9">
						<input type="text" placeholder="Time in current role" class="form-control" id="user_talent_experience_years" name="user_talent_experience_years[]">
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group"></div>
			</div>
		</div>
    </div>
    <div class="text-right">
		<a class="clone_component_button_2" href="javascript:;" onclick="clone_component(this, 2);"><i class="fa fa-plus-circle"></i> Add  Experience</a>
		<a class="remove_component_button_2" href="javascript:;" onclick="remove_component(this, 2);" style="display: none;"><i class="fa fa-minus-circle"></i> Remove</a>
    </div>
</div>
<hr/>
<div class="form-group">
    <div class="row">
		<div class="col-sm-12">
			<div class="row">		
				<h4 class="qualification col-sm-2">Desired Compensation</h4>
				<div class="col-sm-10">
					<div class="form-group">
						<select name="services_id[]" class="form-control" id="services_id" data-placeholder="Desired Compensation" multiple="">
							<option></option>
							<?php foreach ($service_array as $service) { ?>
								<option value="<?php echo $service->service_id; ?>"><?php echo $service->service_name; ?></option>
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
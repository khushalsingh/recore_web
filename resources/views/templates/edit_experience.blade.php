<?php
if (count($user_talent_array['user_talent_experience_array']) > 0) {
    foreach ($user_talent_array['user_talent_experience_array'] as $key => $experience) {
        ?>
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
                                <input type="text" placeholder="Organization" class="form-control" id="user_talent_experience_company" name="user_talent_experience_company[]" value="<?php echo $experience['user_talent_experience_company']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="user_talent_experience_role" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Role" class="form-control" id="user_talent_experience_role" name="user_talent_experience_role[]" value="<?php echo $experience['user_talent_experience_role']; ?>">
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
                                <input type="text" placeholder="Time in current role" class="form-control" id="user_talent_experience_years" name="user_talent_experience_years[]" value="<?php echo $experience['user_talent_experience_years']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <?php if ($key == count($user_talent_array['user_talent_experience_array']) - 1) { ?>
                    <a class="clone_component_button_2" href="javascript:;" onclick="clone_component(this, 2);"><i class="fa fa-plus-circle"></i> Add a Experience</a>
                <?php } else { ?>
                    <a class="clone_component_button_2" href="javascript:;" onclick="clone_component(this, 2);" style="display: none"><i class="fa fa-plus-circle"></i> Add a Experience</a>
                <?php } ?>
                <?php if (count($user_talent_array['user_talent_experience_array']) === 1) { ?>
                    <a class="remove_component_button_2" href="javascript:;" onclick="remove_component(this, 2);" style="display:none"><i class="fa fa-minus-circle"></i> Remove</a>
                <?php } else { ?>
                    <a class="remove_component_button_2" href="javascript:;" onclick="remove_component(this, 2);"><i class="fa fa-minus-circle"></i> Remove</a>
                <?php } ?>
            </div>
        </div>
        <hr/>
        <?php
    }
} else {
    ?>
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
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <a class="clone_component_button_2" href="javascript:;" onclick="clone_component(this, 2);"><i class="fa fa-plus-circle"></i> Add  Experience</a>
            <a class="remove_component_button_2" href="javascript:;" onclick="remove_component(this, 2);" style="display: none;"><i class="fa fa-minus-circle"></i> Remove</a>
        </div>
    </div>
    <hr/>
    <?php
}
?>


<style type="text/css">
    .select2-container .select2-selection--single  {
        height:34px !important;
        border:1px solid #ccc !important;
    }
    .help-block{
        color:red !important;
    }
    .has-error .form-control{
        border-color: red !important;
    }
    .has-error .select2-container--default .select2-selection--single {
        border: 1px solid red !important;
        border-radius:5px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color:#000 !important;
    }
    .remove_image_button{
        margin-top:-12px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Resume <small>Add New Candidate Resume</small></h1>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Add Resume</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form id="edit_resume_form" method="post" action="" role="form">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="qualification">Personal Information</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_first_name" class="control-label col-sm-3">First Name</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" name="user_talent_first_name" id="user_talent_first_name" class="form-control" placeholder="First Name" value="<?php echo $user_talent_array['user_talent_first_name']; ?>"/>
                                    </div>			
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_last_name" class="control-label col-sm-3">Last Name</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" name="user_talent_last_name" id="user_talent_last_name" class="form-control" placeholder="Last Name"value="<?php echo $user_talent_array['user_talent_last_name']; ?>"/>
                                    </div>			
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_email" class="control-label col-sm-3">Email</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" name="user_talent_email" id="user_talent_email" class="form-control" placeholder="Email"value="<?php echo $user_talent_array['user_talent_email']; ?>"/>
                                    </div>			
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_current_position" class="control-label col-sm-3">Current Position</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" name="user_talent_current_position" id="user_talent_current_position" class="form-control" placeholder="Current Position" value="<?php echo $user_talent_array['user_talent_current_position']; ?>"/>
                                    </div>			
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="talent_categories_id" class="control-label col-sm-3">Category</label>
                                    <div class="col-sm-9 show-error">
                                        <select id="talent_categories_id" name="talent_categories_id" class="form-control" data-placeholder="Category">
                                            <option></option>
                                            <?php foreach ($talent_category_array as $talent_category) { ?>
                                                <option value="<?php echo $talent_category['talent_category_id']; ?>" <?php echo $talent_category['talent_category_id'] === $user_talent_array['talent_categories_id'] ? 'selected="selected"' : ''; ?>><?php echo $talent_category['talent_category_name']; ?></option>
                                            <?php } ?>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_contact" class="control-label col-sm-3">Contact Number</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" name="user_talent_contact" id="user_talent_contact" class="form-control" placeholder="Contact Number" value="<?php echo $user_talent_array['user_talent_contact']; ?>" />  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 show-error">
                                <div class="form-group">
                                    <label for="user_talent_alternative_contact" class="control-label col-sm-3">Alternative Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="user_talent_alternative_contact" placeholder="Alternative Contact Number" id="user_talent_alternative_contact" class="form-control" value="<?php echo $user_talent_array['user_talent_alternative_contact']; ?>"/>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="talent_categories_id" class="control-label col-sm-3">Experience Level</label>
                                    <div class="col-sm-9 show-error">
                                        <select id="user_talent_level_of_experience" class="form-control" data-placeholder="Level of Experience" name="user_talent_level_of_experience" id="user_talent_level_of_experience">
                                            <option></option>
                                            <option value="1" <?php echo $user_talent_array['user_talent_level_of_experience'] === '1' ? 'selected="selected"' : ''; ?>>high Potential</option>
                                            <option value="2" <?php echo $user_talent_array['user_talent_level_of_experience'] === '2' ? 'selected="selected"' : ''; ?>>Mid Level</option>
                                            <option value="3" <?php echo $user_talent_array['user_talent_level_of_experience'] === '3' ? 'selected="selected"' : ''; ?>>Senior Level</option>
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
                                    <label for="user_talent_video_link" class="col-sm-3">Video Resume</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" id="user_talent_video_link" name="user_talent_video_link" class="form-control" placeholder="Video Resume Link" value="<?php echo $user_talent_array['user_talent_video_link']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_work_style_assessment" class="col-sm-3">Work Style Assessment Link</label>
                                    <div class="col-sm-9 show-error">
                                        <input type="text" id="user_talent_work_style_assessment" name="user_talent_work_style_assessment" class="form-control" placeholder="Work Style Assessment Link" value="<?php echo $user_talent_array['user_talent_work_style_assessment']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_resume" class="col-sm-3">Upload Fresh Resume</label>
                                    <div class="col-sm-9 show-error">
                                        <div id="resume_upload_container">
                                            <a title="upload resume" id="resume_uploader" href="javascript:;" class="btn"><i class="fa fa-plus"></i> Change Resume</a>
                                            <label for="resume"> pdf,doc,docx (25MB max )</label>
                                            <br/>
                                            <div id="user_resume_div"><?php if (is_file(FCPATH . 'uploads/talents/resumes/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array['user_talent_created'])) . $user_talent_array['user_talent_resume'])) { ?><div>
                                                        <div class="col-md-2 col-md-offset-4 text-center">
                                                            <a title="remove file" class="pull-right remove_image_button" onclick="$(this).parent().remove();" style="cursor:pointer"><i class="fa fa-2x fa-times-circle"></i></a>
                                                            <input type="hidden" name="user_talent_resume" id="user_talent_resume" value="<?php echo $user_talent_array['user_talent_resume']; ?>"/>
                                                            <?php
                                                            $ext = pathinfo($user_talent_array['user_talent_resume'], PATHINFO_EXTENSION);
                                                            switch ($ext) {
                                                                case 'pdf':
                                                                    $file_icon = 'fa-file-pdf-o';
                                                                    break;
                                                                case 'doc':
                                                                case 'docx':
                                                                    $file_icon = 'fa-file-word-o';
                                                                    break;
                                                                default :
                                                                    $file_icon = 'fa-file-word-o';
                                                                    break;
                                                            }
                                                            ?>
                                                            <div class="text-center"><a href = "<?php echo url('/') . 'uploads/talents/resumes/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array['user_talent_created'])) . $user_talent_array['user_talent_resume']; ?>" target = "_blank" title="Click Here"><i class="fa <?php echo $file_icon ?> fa-3x"></i></span></a></div>
                                                        </div></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_talent_resume" class="col-sm-3">Upload Image</label>
                                    <div class="col-sm-9 show-error">
                                        <div id="image_upload_container">
                                            <a title="upload image" id="image_uploader" href="javascript:;" class="btn"><i class="fa fa-plus"></i> Change Image</a>
                                            <label for="image"> jpg,jpeg,png (10MB max )</label>
                                            <br/>
                                            <div id="user_image_div">
                                                <?php if (is_file(FCPATH . 'uploads/talents/images/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array['user_talent_created'])) . $user_talent_array['user_talent_thumb'])) { ?>
                                                    <div>
                                                        <div class="col-md-3 col-md-offset-4 text-center">
                                                            <a title="remove image" class="pull-right remove_image_button" onclick="$(this).parent().remove();" style="cursor:pointer"><i class="fa fa-2x fa-times-circle"></i></a>
                                                            <input type="hidden" name="user_talent_image" id="user_talent_image" value="<?php echo $user_talent_array['user_talent_thumb']; ?>">
                                                            <img alt="" class="img img-responsive" src="<?php echo url('/') . 'uploads/talents/images/' . date('Y/m/d/H/i/s/', strtotime($user_talent_array['user_talent_created'])) . $user_talent_array['user_talent_thumb']; ?>" style="width:80px;height:80px;" /></div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <?php $this->load->view('templates/edit_qualification'); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group text-center">
                                <a href="<?php echo url('/'); ?>user/talents" class="btn btn-default btn-lg">Cancel</a>
                                <button type="submit" id="add_resume_button" class="btn btn-lg btn-success" data-loading-text="Please wait....">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?php echo url('/'); ?>assets/js/plugins/plupload/js/plupload.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script>
                                                            function change_courses() {
                                                                $(".talent-qualification").change(function () {
                                                                    var that = this;
                                                                    if ($(this).val() > 0) {
                                                                        $.post(base_url + 'user/get_course_by_qualification_id', {qualifications_id: $(this).val()}, function (data) {
                                                                            $(that).closest('.qualification-div').next('.course-div').find('select').empty();
                                                                            $(that).closest('.qualification-div').next('.course-div').find('select').append("<option></option>");
                                                                            for (var i = 0; i < data.length; i++) {
                                                                                $(that).closest('.qualification-div').next('.course-div').find('select').append('<option value="' + data[i].course_id + '">' + data[i].course_name + '</option>');
                                                                            }
                                                                        });
                                                                    } else {
                                                                        $(that).closest('.qualification-div').next('.course-div').find('select').empty();
                                                                    }
                                                                });
                                                            }
                                                            $(function () {
                                                                change_courses();
                                                                $("#user_talent_dob").datepicker({
                                                                    dateFormat: 'dd/mm/yy'
                                                                });
                                                                var resume_uploader = new plupload.Uploader({
                                                                    runtimes: 'html5,flash,html4',
                                                                    browse_button: "resume_uploader",
                                                                    container: "resume_upload_container",
                                                                    url: "<?php echo url('/'); ?>auth/upload_files",
                                                                    chunk_size: '1mb',
                                                                    unique_names: true,
                                                                    flash_swf_url: "<?php echo url('/'); ?>assets/js/plugins/plupload/js/Moxie.swf",
                                                                    silverlight_xap_url: "<?php echo url('/'); ?>assets/js/plugins/plupload/js/Moxie.xap", filters: {max_file_size: '26mb',
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
                                                                            $("#user_talent_resume").val(file.target_name);
                                                                            $("#user_talent_resume_original_file").val(file.name);
                                                                            $("#user_resume_div").html('<div><div class="col-md-3 col-md-offset-4 text-center"><a title="remove image" class="pull-right remove_image_button" onclick="$(this).parent().remove();" style="cursor:pointer"><i class="fa fa-2x fa-times-circle"></i></a><input type="hidden" name="user_talent_resume" id="user_talent_resume" value="' + file.target_name + '"><a href = "<?php echo url('/'); ?>uploads/' + file.target_name + '" target = "_blank" title="Click Here"><i class="fa ' + file_icon + ' fa-3x"></i><br/></a></div></div>');
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
                                                                var image_uploader = new plupload.Uploader({
                                                                    runtimes: 'html5,flash,html4',
                                                                    browse_button: "image_uploader",
                                                                    container: "image_upload_container",
                                                                    url: "<?php echo url('/'); ?>auth/upload_files",
                                                                    chunk_size: '1mb',
                                                                    unique_names: true,
                                                                    flash_swf_url: "<?php echo url('/'); ?>assets/js/plugins/plupload/js/Moxie.swf",
                                                                    silverlight_xap_url: "<?php echo url('/'); ?>assets/js/plugins/plupload/js/Moxie.xap", filters: {max_file_size: '11mb',
                                                                        mime_types: [
                                                                            {title: "Document files", extensions: "jpg,jpeg,png"}]
                                                                    }, init: {
                                                                        FilesAdded: function (up, files) {
                                                                            if (up.files.length > 1) {
                                                                                image_uploader.removeFile(image_uploader.files[0]);
                                                                            }
                                                                            setTimeout(function () {
                                                                                up.start();
                                                                                $(window).block({message: 'Please wait...'});
                                                                            }, 1);
                                                                        },
                                                                        FileUploaded: function (up, file) {
                                                                            $("#user_image_div").html('<div><div class="col-md-3 col-md-offset-4 text-center"><a title="remove image" class="pull-right remove_image_button" onclick="$(this).parent().remove();" style="cursor:pointer"><i class="fa fa-2x fa-times-circle"></i></a><input type="hidden" name="user_talent_image" id="user_talent_image" value="' + file.target_name + '"><img alt="" class="img img-responsive" src="' + base_url + 'uploads/' + file.target_name + '" style="width:80px;height:80px;" /></div></div>');
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
                                                                image_uploader.init();
                                                                $("#edit_resume_form").validate({
                                                                    errorElement: 'span',
                                                                    errorClass: 'help-block pull-right',
                                                                    focusInvalid: true,
                                                                    ignore: null,
                                                                    rules: {
                                                                        user_talent_first_name: {
                                                                            required: true
                                                                        },
                                                                        user_talent_last_name: {
                                                                            required: true
                                                                        },
                                                                        user_talent_email: {
                                                                            required: true,
                                                                            remote: {
                                                                                type: "post",
                                                                                url: "<?php echo url('/'); ?>user/check_duplicate_email/<?php echo $user_talent_array['user_talent_id']; ?>"
                                                                                                    }
                                                                                                },
                                                                                                user_talent_current_position: {
                                                                                                    required: true
                                                                                                },
                                                                                                talent_categories_id: {
                                                                                                    required: true
                                                                                                },
                                                                                                user_talent_contact: {
                                                                                                    required: true
                                                                                                },
                                                                                                user_talent_level_of_experience: {
                                                                                                    required: true
                                                                                                },
                                                                                                user_talent_dob: {
                                                                                                    required: true
                                                                                                }
                                                                                            },
                                                                                            messages: {
                                                                                                user_talent_first_name: {
                                                                                                    required: "Please fill first name"
                                                                                                },
                                                                                                user_talent_last_name: {
                                                                                                    required: "Please fill last name"
                                                                                                },
                                                                                                user_talent_email: {
                                                                                                    required: "Please fill email",
                                                                                                    remote: "Email already exist"
                                                                                                },
                                                                                                user_talent_current_position: {
                                                                                                    required: "Please fill current position"
                                                                                                },
                                                                                                talent_categories_id: {
                                                                                                    required: "Please select category"
                                                                                                },
                                                                                                user_talent_contact: {
                                                                                                    required: "Please fill contact number"
                                                                                                },
                                                                                                user_talent_level_of_experience: {
                                                                                                    required: "Please select level of experience"
                                                                                                },
                                                                                                user_talent_dob: {
                                                                                                    required: "Please fill date of birth"
                                                                                                }
                                                                                            },
                                                                                            invalidHandler: function (event, validator) {
                                                                                                //show_signup_error();
                                                                                            },
                                                                                            highlight: function (element) {
                                                                                                $(element).closest('.form-group .show-error').addClass('has-error .place-error');
                                                                                            },
                                                                                            unhighlight: function (element) {
                                                                                                $(element).closest('.form-group .show-error').removeClass('has-error');
                                                                                            },
                                                                                            success: function (element) {
                                                                                                $(element).closest('.form-group .show-error').removeClass('has-error');
                                                                                                $(element).closest('.form-group .show-error').children('span.help-block').remove();
                                                                                            },
                                                                                            errorPlacement: function (error, element) {
                                                                                                error.appendTo(element.closest('.form-group .show-error'));
                                                                                            },
                                                                                            submitHandler: function (form) {
                                                                                                $(window).block({message: 'Please wait...'});
                                                                                                $.post('', $("#edit_resume_form").serialize(), function (data) {
                                                                                                    if (data === '1') {
                                                                                                        bootbox.alert("Resume Updated Successfully", function () {
                                                                                                            document.location.href = base_url + 'user/talents';
                                                                                                        });
                                                                                                    } else if (data === '0') {
                                                                                                        bootbox.alert("Error Adding Resume.");
                                                                                                    } else {
                                                                                                        bootbox.alert(data);
                                                                                                    }
                                                                                                    $(window).unblock();
                                                                                                });
                                                                                            }
                                                                                        });
                                                                                        $('select').change(function () {
                                                                                            $("#edit_resume_form").validate().element($(this));
                                                                                        });
                                                                                        $('select').select2({allowClear: true});
                                                                                    });
                                                                                    function clone_component(t, n) {
                                                                                        var tr = $(t).closest('.clone_component_' + n);
                                                                                        tr.find('select').each(function (i, o) {
                                                                                            $(o).select2('destroy');
                                                                                        });
                                                                                        var clone = tr.clone();
                                                                                        clone.find('input,select').val('');
                                                                                        clone.find('input[type=checkbox]').attr('checked', false);
                                                                                        clone.find('.show_file_div').empty();
                                                                                        tr.after(clone);
                                                                                        $('select').select2({allowClear: true});
                                                                                        clone.find('.talent-course').empty();
                                                                                        if ($('.clone_component_' + n).length !== 1) {
                                                                                            $('.remove_component_button_' + n).show();
                                                                                        }
                                                                                        $(t).hide();
                                                                                        handle_component(n);
                                                                                    }
                                                                                    function remove_component(t, n) {
                                                                                        if ($('.clone_component_' + n).length !== 1) {
                                                                                            $(t).closest('.clone_component_' + n).remove();
                                                                                            if ($('.clone_component_' + n).length === 1) {
                                                                                                $('.remove_component_button_' + n).hide();
                                                                                            }
                                                                                        } else {
                                                                                            $('.remove_component_button_' + n).hide();
                                                                                        }
                                                                                        $('.clone_component_button_' + n).eq(($('.clone_component_' + n).length - 1)).show();
                                                                                        handle_component(n);
                                                                                    }
                                                                                    function handle_component(n) {
                                                                                        if (n == '1') {
                                                                                            change_courses();
                                                                                            $('.talent-qualification').each(function (i, v) {
                                                                                                $(v).attr('id', 'qualifications_id' + i);
                                                                                            });
                                                                                            $('.talent-course').each(function (i, v) {
                                                                                                $(v).attr('id', 'courses_id' + i);
                                                                                            });
                                                                                        }
                                                                                    }

</script>

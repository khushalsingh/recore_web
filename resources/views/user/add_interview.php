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
    .form-group {
        float: left;
        margin-bottom: 15px;
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1 style="display:inline-block">Schedule Interview</h1>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li>Schedule Interview</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <form id="add_user_interview_schedule_form" action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="users_id" class="col-sm-3">Employer</label>
                            <div class="col-sm-9 show-error">
                                <select class="form-control" data-placeholder="Employer Email ID" name="users_id" id="users_id">
                                    <option></option>
                                    <?php foreach ($user_detail_array as $user) { ?>
                                        <option value="<?php echo $user['user_id']; ?>"><?php echo $user['user_company'] . ' (' . $user['user_email'] . ' )'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="users_id" class="col-sm-3">Candidate Email ID</label>
                            <div class="col-sm-9 show-error">
                                <select class="form-control" data-placeholder="Candidate Email ID" name="user_talents_id" id="user_talents_id">
                                    <option></option>
                                    <?php foreach ($user_talent_array as $user_talent) { ?>
                                        <option value="<?php echo $user_talent['user_talent_id']; ?>"><?php echo $user_talent['user_talent_email']; ?></option>
                                    <?php } ?>                                        
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_interview_schedule_date" class="control-label col-sm-3">Interview Date</label>
                            <div class="col-sm-9 show-error">
                                <div class="input-group date schedule_interview_date_picker">
                                    <input type="text" id="user_interview_schedule_date" name="user_interview_schedule_date" class="form-control" placeholder="Interview Date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar bigger-110"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_interview_schedule_date" class="control-label col-sm-3">Interview Time</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-md-6 show-error">
                                        <select data-placeholder="Hours" class="form-control" id="user_interview_schedule_hours" name="user_interview_schedule_hours">
                                            <option></option>
                                            <?php for ($i = 0; $i < 23; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i <= 9 ? '0' . $i : $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 show-error">
                                        <select data-placeholder="Minutes" class="form-control" id="user_interview_schedule_minutes" name="user_interview_schedule_minutes">
                                            <option></option>
                                            <?php for ($i = 0; $i < 60; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i <= 9 ? '0' . $i : $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>user/interviews" class="btn btn-default">Cancel</a>
                            <button type="submit" id="schedule_interview_button" class="btn btn-success">Schedule</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div><link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#user_interview_schedule_date").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: '+0D'
        });
        $('select').select2();
        $("#add_user_interview_schedule_form").validate({
            errorElement: 'span',
            errorClass: 'help-block pull-right',
            focusInvalid: true,
            ignore: null,
            rules: {
                users_id: {
                    required: true
                },
                user_talents_id: {
                    required: true
                },
                user_interview_schedule_date: {
                    required: true
                },
                user_interview_schedule_minutes: {
                    required: true
                },
                user_interview_schedule_hours: {
                    required: true
                }
            },
            messages: {
                users_id: {
                    required: "Please selecte employer"
                },
                user_talents_id: {
                    required: "Please select candidate"
                },
                user_interview_schedule_date: {
                    required: "Please fill interview date"
                },
                user_interview_schedule_minutes: {
                    required: "Please select minutes"
                },
                user_interview_schedule_hours: {
                    required: "Please select hours"
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
                $.post('', $("#add_user_interview_schedule_form").serialize(), function (data) {
                    if (data === '1') {
                        bootbox.alert("Interview Scheduled Successfully.", function () {
                            document.location.href = base_url + 'user/interviews';
                        });
                    } else if (data === '0') {
                        bootbox.alert("Error Posting Job.");
                    } else {
                        bootbox.alert(data);
                    }
                    $(window).unblock();
                });
            }
        });
        $('select').change(function () {
            $("#add_user_interview_schedule_form").validate().element($(this));
        });
    });
</script>


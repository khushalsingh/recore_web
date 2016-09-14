@extends('layouts.default')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2> Talent in Process</h2>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('/'); ?>">Home</a></li>
                    <li><a href="<?php echo url('/'); ?>/my-dashboard">Dashboard</a></li>
                    <li>Talent in Process</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="bg-in-pages">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Category</th>
                        <th>Level of Experience</th>
                        <th>Interview Date/Time</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($user_interview_schedule_array) > 0) {
                        foreach ($user_interview_schedule_array as $interview) {
                            ?>   <tr>
                                <td>
                                    <?php echo $interview->user_talent_first_name . ' ' . $interview->user_talent_last_name; ?></td>
                                <td><?php echo $interview->talent_category_name; ?></td>
                                <td> <?php
                                    switch ($interview->user_talent_level_of_experience) {
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
                                    ?>
                                </td>
                                <td><?php echo date('d M Y', strtotime($interview->user_interview_schedule_date)).' '.date('h:i a', strtotime($interview->user_interview_schedule_time)); ?></td>
                                <td>
                                    <?php
                                    switch ($interview->user_interview_schedule_status) {
                                        case '1':
                                            echo '<div class="text-center"><input onchange="select_candidate(' . $interview->user_interview_schedule_id . ')" id="id_' . $interview->user_interview_schedule_id . '" type="checkbox" checked="checked" disabled="disabled"/> Selected </div>';
                                            break;
                                        default:
                                            echo '<div class="text-center"><input onchange="select_candidate(' . $interview->user_interview_schedule_id . ')" id="id_' . $interview->user_interview_schedule_id . '" type="checkbox" /> In Process </div>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn default view" title="view resume" href="<?php echo url('/'); ?>/user/view-resume/<?php echo $interview->user_talent_id; ?>" target="_blank"><i class="fa fa-file"></i>
                                    </a>   
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No Records.</td></tr>';
                    }
                    ?>              
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    .bg-in-pages > table > thead{
        background-color: #38a7bb;
        color: #fff
    }
    .btn.btn.default.view {
        background-color: #38a7bb;
        color: #ffffff;
        font-size: 14px;
        margin-bottom: 5px;
        padding: 6px 8px;
    }
    .fa.fa-trash.fa-2x {
        font-size: 15px;
        color: #fff;
    }
    .fa.fa-calendar{
        font-size: 15px;
        color: #fff;   
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script>
    function select_candidate(user_interview_schedule_id) {
        $(window).block({message: 'Please wait...'});
        $.post(base_url + 'user/change_user_interview_schedule_status', {user_interview_schedule_id: user_interview_schedule_id, user_interview_schedule_status: $("#id_" + user_interview_schedule_id).is(":checked")}, function (data) {
            if (data === '1') {
                bootbox.alert("Status Changed Successfully", function () {
                    document.location.href = '';
                });
            } else if (data === '0') {
                bootbox.alert("Error Updating User Status !!!");
            } else {
                bootbox.alert(data);
            }
            $(window).unblock();
        });
    }
</script>
@endsection
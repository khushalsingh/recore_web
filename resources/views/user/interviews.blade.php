@extends('layouts.admin')
@section('content')
<style type="text/css">
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #ddd;
    }
    .table-responsive > .table {
        margin-bottom: 0;
    }
    .table-responsive > .table > thead > tr > th,
    .table-responsive > .table > tbody > tr > th,
    .table-responsive > .table > tfoot > tr > th,
    .table-responsive > .table > thead > tr > td,
    .table-responsive > .table > tbody > tr > td,
    .table-responsive > .table > tfoot > tr > td {
        white-space: nowrap;
    }
    .table-responsive > .table-bordered {
        border: 0;
    }
    .table-responsive > .table-bordered > thead > tr > th:first-child,
    .table-responsive > .table-bordered > tbody > tr > th:first-child,
    .table-responsive > .table-bordered > tfoot > tr > th:first-child,
    .table-responsive > .table-bordered > thead > tr > td:first-child,
    .table-responsive > .table-bordered > tbody > tr > td:first-child,
    .table-responsive > .table-bordered > tfoot > tr > td:first-child {
        border-left: 0;
    }
    .table-responsive > .table-bordered > thead > tr > th:last-child,
    .table-responsive > .table-bordered > tbody > tr > th:last-child,
    .table-responsive > .table-bordered > tfoot > tr > th:last-child,
    .table-responsive > .table-bordered > thead > tr > td:last-child,
    .table-responsive > .table-bordered > tbody > tr > td:last-child,
    .table-responsive > .table-bordered > tfoot > tr > td:last-child {
        border-right: 0;
    }
    .table-responsive > .table-bordered > tbody > tr:last-child > th,
    .table-responsive > .table-bordered > tfoot > tr:last-child > th,
    .table-responsive > .table-bordered > tbody > tr:last-child > td,
    .table-responsive > .table-bordered > tfoot > tr:last-child > td {
        border-bottom: 0;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1 style="display:inline-block">Interview Schedules <small>Listing of all interview schedules</small></h1>
        <a href="<?php echo url('/'); ?>user/add_interview" class="btn btn-success"><i class="fa fa-calendar"></i> Schedule an Interview</a>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i>my-dashboard</a></li>
            <li>Interview Schedules</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="box-body table-responsive">
                    <table id="user_datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="medwidth">Employer Company</th>
                                <th class="medwidth">Employer Name</th>
                                <th class="medwidth">Employer Email</th>
                                <th class="medwidth">Employer Contact</th>
                                <th class="medwidth">Candidate Email</th>
                                <th class="medwidth">Candidate Contact</th>
                                <th class="medwidth">Candidate Name</th>
                                <th class="medwidth">Interview Date/Time</th>
                                <th class="medwidth">Status</th>
                                <th class="smallwidth">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo url('/'); ?>/assets/js/plugins/datatables/DT_bootstrap.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(function () {
		$('#user_datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: base_url + "/page/contact_datatable",
			columns: [
				{data: 'contact_us_feed_id', name: 'contact_us_feed_id', visible: false},
				{data: 'contact_us_feed_first_name', name: 'contact_us_feed_first_name',
					render: function (data, type, full) {
						return full.contact_us_feed_first_name + ' ' + full.contact_us_feed_last_name;
					}
				},
				{data: 'contact_us_feed_email', name: 'contact_us_feed_email'},
				{data: 'contact_us_feed_subject', name: 'contact_us_feed_subject'},
				{data: 'contact_us_feed_message', name: 'message', searchable: false, orderable: false
				},
				{data: 'contact_us_feed_created', name: 'contact_us_feed_created', searchable: false},
			]
		});
		$.fn.dataTable.ext.errMode = 'throw';
	});
	function user_talent_status(user_interview_schedule_id) {
		$.post(base_url + "user/change_user_interview_schedule_status", {user_interview_schedule_id: user_interview_schedule_id, user_interview_schedule_status: $("#id_" + user_interview_schedule_id).is(":checked")}, function (data) {
			if (data === '1') {
				bootbox.alert("Visibility Changed Successfully", function () {
					window.location.href = '';
				});
			} else if (data === '0') {
				bootbox.alert("Error Updating User Status !!!");
			} else {
				bootbox.alert(data);
			}
		});
	}
	function delete_interview_schedule(user_interview_schedule_id) {
		bootbox.confirm("Are you sure to delete interview schedule?", function (result) {
			if (result) {
				$.post(base_url + 'user/delete_interview_schedule', {user_interview_schedule_id: user_interview_schedule_id}, function (data) {
					if (data === '1') {
						bootbox.alert("Interview Schedule Deleted", function () {
							document.location.href = '';
						});
					} else if (data === '0') {
						bootbox.alert("Error. Please try again.");
					} else {
						bootbox.alert(data);
					}
				});
			}
		});
	}
</script>
@endsection

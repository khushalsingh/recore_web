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
        <h1>Talent Network <small>Talent Network</small></h1>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i> Talent Network</a></li>
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
                                <th class="smallwidth">Name</th>
                                <th class="smallwidth">Email</th>
                                <th class="medwidth">Current Role</th>
                                <th class="medwidth">Talent Category</th>
                                <th class="medwidth">Contact Number</th>
                                <th class="medwidth">Level of Experience</th>
                                <th class="medwidth">Resume File</th>
                                <th class="medwidth">Visible to Employer</th>
                                <th class="largewidth">Actions</th>
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
			ajax: base_url + "/user/talent_datatable",
			columns: [
				{data: 'user_talent_id', name: 'user_talent_id', visible: false},
				{data: 'user_talent_first_name', name: 'user_talent_first_name',
					render: function (data, type, full) {
						return full.user_talent_first_name + ' ' + full.user_talent_last_name;
					}
				},
				{data: 'user_talent_email', name: 'user_talent_email',
				"render": function (data, type, full) {
                        return '<div><a href="mailto:' + data + '">' + data + '</a></div>';
                    }},
				{data: 'user_talent_current_position', name: 'user_talent_current_position'},
				{data: 'talent_category_name', name: 'talent_category_name'},
				{data: 'user_talent_contact', name: 'user_talent_contact'},
				{data: 'user_talent_level_of_experience', name: 'user_talent_level_of_experience', searchable: false,
					"render": function (data, type, full) {
						switch (data) {
							case '1':
								return 'High Potential';
								break;
							case '2':
								return 'Mid Level';
								break;
							case '3':
								return 'Senior Level';
								break;
							default:
								return 'High Potential';
						}
					}
				},
				{data: 'resume_file', name: 'resume_file',
					render: function (data, type, full) {
						if (data != '') {
							return '<div><a href="' + data + '" target="_blank">View/Download Resume</a></div>';
						} else {
							return 'No Resume Added';
						}
					}},
				{data: 'user_talent_status', 'name': 'user_talent_status',
					"render": function (data, type, full) {
						switch (data) {
							case '1':
								return '<div class="text-center"><input onchange="user_talent_status(' + full.user_talent_id + ')" id="id_' + full.user_talent_id + '" type="checkbox" checked="checked" /> </div>';
								break;
							default:
								return '<div class="text-center"><input onchange="user_talent_status(' + full.user_talent_id + ')" id="id_' + full.user_talent_id + '" type="checkbox" /> </div>';
								break;
						}
					}
				},
				{data: null,
					render: function (data, type, full) {
						return '<div><a href="' + base_url + 'user/edit_resume/' + full.user_talent_id + '" class="btn btn-success btn-sm" title="Edit Resume"><i class="fa fa-pencil-square-o"></i> Edit</a> <a href="' + base_url + 'user/view_resume/' + full.user_talent_id + '" class="btn btn-info btn-sm" target="_blank" title="View Resume"><i class="fa fa-eye"></i> View</a></div>';
					}
				}
			]
		});
		$.fn.dataTable.ext.errMode = 'throw';
	});
	function user_talent_status(user_talent_id) {
		$.post(base_url + "/user/change_user_talent_status", {user_talent_id: user_talent_id, user_talent_status: $("#id_" + user_talent_id).is(":checked")}, function (data) {
			if (data === '1') {
				bootbox.alert("Visibility Changed Successfully");
			} else if (data === '0') {
				bootbox.alert("Error Updating User Status !!!");
			} else {
				bootbox.alert(data);
			}
		});
	}
</script>
@endsection

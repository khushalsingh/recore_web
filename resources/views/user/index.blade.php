@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Users <small>users</small></h1>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i> Users</a></li>
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Company</th>
                                <th>Resume File</th>
                                <th>Joining Date</th>
                                <th>Last Logged In</th>
                                <th>Status</th>
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
			ajax: base_url + "/user_datatable",
			columns: [
				{data: 'id', name: 'id', visible: false},
				{data: 'user_name', name: 'user_name', searchable: false},
				{data: 'group_name', name: 'group_name'},
				{data: 'email', name: 'email',
					render: function (data, type, full) {
						return '<div><a href="mailto:' + data + '">' + data + '</a></div>';
					}
				},
				{data: 'user_address', name: 'user_address'},
				{data: 'user_contact', name: 'user_contact'},
				{data: 'user_company', name: 'user_company'},
				{data: 'user_resume', name: 'user_resume', searchable: false, orderable: false,
					render: function (data, type, full, meta) {
						if (data !== '') {
							return '<a href="' + data + '" target="_blank"><i class="fa fa-download"></i> View/Download</a>';
						} else {
							return '';
						}
					}
				},
				{data: 'user_created', name: 'user_created'},
				{data: 'user_last_logged_in', name: 'user_last_logged_in'},
				{data: 'user_status', name: 'user_status', orderable: false, serachable: false,
					render: function (data, type, full, meta) {
						switch (data) {
							case '1':
								return '<div class="text-center"><input onchange="user_status(' + full.id + ')" id="id_' + full.id + '" type="checkbox" checked="checked" /> </div>';
								break;
							default:
								return '<div class="text-center"><input onchange="user_status(' + full.id + ')" id="id_' + full.id + '" type="checkbox" /> </div>';
								break;
						}
					}
				}
			]
		});
		$.fn.dataTable.ext.errMode = 'throw';
	});
	function user_status(id) {
		$.post(base_url + "/change_user_status", {id: id, user_status: $("#id_" + id).is(":checked")}, function (data) {
			if (data === '1') {
				bootbox.alert("User Status Changed Successfully");
			} else if (data === '0') {
				bootbox.alert("Error Updating User Status !!!");
			} else {
				bootbox.alert(data);
			}
		});
	}
</script>
@endsection
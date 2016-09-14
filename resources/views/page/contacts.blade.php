@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Dashboard <small>dashboard</small></h1>
        <ol class="breadcrumb">
            <li class="active"><a href="javascript:;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="box-body table-responsive">
                    <table id="contact_datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Message Created</th>
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
		$('#contact_datatable').DataTable({
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
</script>
@endsection
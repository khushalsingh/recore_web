@extends('layouts.default')
@section('content')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h2> Talent Network</h2>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('/'); ?>">Home</a></li>
                    <li><a href="<?php echo url('/'); ?>/my-dashboard">Dashboard</a></li>
                    <li>Talent Network</li>
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
						<th>Name</th>
						<th>Current Role</th>
						<th>Category</th>
						<th>Comment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($user_talent_network_array) > 0) {
						foreach ($user_talent_network_array as $talent_network) {
							?>
							<tr id="row_<?php echo $talent_network->user_talent_network_id; ?>">
								<td><?php echo $talent_network->user_talent_first_name . ' ' . $talent_network->user_talent_last_name; ?></td>
								<td><?php echo $talent_network->user_talent_current_position; ?></td>
								<td><?php echo $talent_network->talent_category_name; ?></td>
								<td><?php echo $talent_network->user_talent_network_comment; ?></td>
								<td>
									<a class="btn btn default view"data-toggle="tooltip" data-placement="top" title="view resume" href="<?php echo url('/'); ?>/user/view-resume/<?php echo $talent_network->user_talents_id; ?>" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i>
									</a>   
									<button type="button" class="btn btn default view"data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_talent_network('<?php echo $talent_network->user_talent_network_id; ?>')"><i aria-hidden="true" class="fa fa-trash fa-2x"></i>
									</button>
								</td>
							</tr>
							<?php
						}
					} else {
						echo '<tr><td colspan="7"><span class="text-info">No Data.</span></td></tr>';
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
								function delete_talent_network(user_talent_network_id) {
									bootbox.confirm('Are you sure to delete ?', function (result) {
										if (result) {
											$(window).block({message: ' <i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i><br>Please wait...'});
											$.post('', {user_talent_network_id: user_talent_network_id}, function (data) {
												if (data === '1') {
													bootbox.alert('Deleted Successfully.', function () {
														$("#row_" + user_talent_network_id).hide(200);
														if ($("#row_" + user_talent_network_id).is('tbody tr:nth-child(1)')) {
															document.location.href = '';
														}
													});
												} else if (data === '0') {
													bootbox.alert('Error! Please try again.');
												} else {
													bootbox.alert(data);
												}
												$(window).unblock();
											});
										}
									});
								}
</script>
@endsection
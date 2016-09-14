@extends('layouts.default')
@section('content')
<style>
    th {
        color: #38A7BB;
        font-size: 17px;
        font-weight: 500;
        text-align: center;
        width: 134px;
    }
    .date-of-year {
        background: #db1f26 none repeat scroll 0 0 !important;
    }
    .day-of-week {
        font-size: 16px;
    }
    .date-of-week {
        font-size: 31px;
        margin: 0 0 8px;
    }
    .date-border {
        border: 1px solid #dddddd;
    }
    service-top{
        border-top:1px solid #e0e0e0;
        border-bottom:1px solid #e0e0e0;
    }
    .service-left{
        border-left:1px solid #e0e0e0;
        border-right:1px solid #e0e0e0;
    }
    .services-categories {
        margin-bottom: 80px;
        margin-top: 0px;
    }
    .services-categories > li {
        border: 1px solid #e0e0e0;
        float: left;
        margin: 0px 10px;
        width: 46%;
        margin-bottom: 10px;
    }
    .services-item {
        font-size: 14px;
        min-height: 161px;
        padding-top: 23px;
    }
    .glyphicon.glyphicon-chevron-left{
        color: #fff;
        font-size: 17px;
        float: left;
    }
    .glyphicon.glyphicon-chevron-right{
        color: #fff;
        font-size: 17px;
        float: right;
    }
    .services-item {
        background-color: #ffffff;
        display: block;
        text-align: center;
    }
    #month h3 {
        color: #fff;
        font-size: 18px;
        margin: 0;
    }
    .dash{
        padding: 0px 0px;
    }
    table{
        width: 100%!important;
    }
    td {
        padding: 10px 15px!important;
    }
    .table-responsive h3 {
        background-color: #38a7bb;
        color: #fff;
        font-size: 15px;
        margin: 0;
        padding: 8px;
        text-align: center;
        text-transform: uppercase;
    }
    .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th{
        padding: 14px;
    }
    .services-categories.list-unstyled.clearfix{
        margin: 0px;
    }
    .text-yellow{
        color:#FEC503;
    }
    .services h2{
        margin: 66px 0px;
        font-weight: 500;
        color:#494949;
        font-weight: 700;
        text-transform: uppercase;
    }
    .icon-new {
        display: block;
        margin: 16px 0;
        overflow: hidden;
    }
    .panel-title {
        margin-top: 6px;
    }
    .panel-heading{
        padding: 10px 15px;
    }
    .service-heading{
        color:#494949;
        font-size: 14px;
        text-transform: uppercase;
        font-weight:200;
    }
    .services-categories2:hover {
        box-shadow: 3px 4px 18px 0 rgba(119, 119, 119, 0.3);
        outline: medium none;
        text-decoration: none;
    }
    #show_calendar td a{
        color :blue;
        text-decoration: underline !important;
    }
	.highlight a {
		color: #ffffff !important;
		padding: 0 6px;
	}
    #show_calendar th a{
        color:white !important;
    }
    #week_calendar .panel-heading a{
        color:white !important;
    }
    #show_calendar h3{
        font-size: 20px;
    }
    #show_calendar .highlight{
        background-color: #000;
        border-radius: 100%;
        color: #fff;
        font-weight: 800;
        height: 23px;
        padding: 1px 0 0 2px;
        width: 23px;
    }
    #week_calendar .table .fa-bell{
        color:#38a7bb !important;
    }
    #week_calendar h1{
        margin-bottom: 5px !important;
        margin-top: 5px !important;
    }
</style>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <h1>My Dashboard</h1>
            </div>
            <div class="col-md-5 col-sm-5">
                <ul class="breadcrumb">
                    <li><a href="<?php echo url('/'); ?>">Home</a></li> 
                    </li>
                    <li>My Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section id="services">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="services intro-heading">
					<h3 class="">Welcome {{Auth::user()->user_first_name.' '.Auth::user()->user_last_name}}</h3>
				</div>
				<hr/>
			</div>            
            <div class="col-md-7 dash">
                <ul class="services-categories list-unstyled clearfix">
                    <li class="services-categories2"><a class="services-item" href="<?php echo url('/'); ?>/search-talent/hr-talent">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Gender Neutral User icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/talent.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">Hr Talent</h4>
                            </div>
                        </a>
                    </li>
                    <li class="services-categories2">
                        <a class="services-item" href="<?php echo url('/'); ?>/talent-network">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Network icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/network.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">My Talent Network</h4>
                            </div>
                        </a>
                    </li>
                    <li class="services-categories2"><a class="services-item" href="#">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Services icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/services.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">Operations Talent</h4>
                            </div>
                        </a>
                    </li>
                    <li class="services-categories2">   
                        <a class="services-item" href="<?php echo url('/'); ?>/talent-in-process">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Process icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/process.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">Talent in Process</h4>
                            </div>
                        </a>
                    </li>
                    <li class="services-categories2"><a class="services-item" href="<?php echo url('/'); ?>/search-talent/sales-and-marketing-talent">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Sales Performance icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/sales.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">Sales and Marketing Talent</h4>
                            </div>
                        </a>
                    </li>
                    <li class="services-categories2"><a class="services-item" href="#">
                            <div class="//service-left">
                                <span class="icon-new">
                                    <!-- Show Property icon by Icons8 -->
                                    <img src="{{URL::asset('assets/img/searches.png')}}" class="img-responsive center-block">
                                </span>
                                <h4 class="service-heading">Active Searches</h4>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12" id="calendar-view">
                        <div class="table-responsive" id="show_calendar">
                        </div>
                    </div>
                </div>			
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary" id="week_calendar">

                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>
<script>
$(function () {
	$.post(base_url + 'user/calendar', {year:<?php echo date('Y'); ?>, month:<?php echo date('m'); ?>}, function (data) {
		$("#show_calendar").html(data);
	});
	$.post(base_url + 'user/weekly_calendar', {next_monday: '', next_sunday: ''}, function (data) {
		$("#week_calendar").html(data);
		$("#week_calendar").unblock();
	});
});
function change_date(year, month) {
	$('#calendar-view').block({message: '<i class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"></i>'});
	$.post(base_url + 'user/calendar', {year: year, month: month}, function (data) {
		$("#show_calendar").html(data);
		$('#calendar-view').unblock();
	});
}
function change_week(next_monday, next_sunday) {
	$("#week_calendar").block({message: '<i class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"></i>'});
	$.post(base_url + 'user/weekly_calendar', {next_monday: next_monday, next_sunday: next_sunday}, function (data) {
		$("#week_calendar").html(data);
		$("#week_calendar").unblock();
	});
}
</script>
@endsection
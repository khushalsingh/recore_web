@extends('layouts.default')
@section('content')
<div id="heading-breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-7 col-xs-12">
				<h1 class="small-letter-upper">What is reCore?</h1>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="{{url('/page/index')}}">Home</a></li> 
					</li>
					<li class="">What is reCore?</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<div class="heading">
						<h2>About reCore</h2>
					</div>
					<p class="lead">reCore Talent is a platform that aims at building a bridge between leading businesses
						and high performing talent. We help organizations by making strategic, long term
						placements while giving candidates high touch and guidance as they navigate their
						career life.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group accordion" id="accordionThree">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3a">
										Why reCore?
									</a> 
								</h4> 
							</div>  
							<div id="collapse3a" class="panel-collapse collapse in">
								<div class="panel-body"> 
									<div class="row">
										<div class="col-md-12">  
											<p>If you are an organization seeking local talent in your most essential functions or an accomplished professional looking for a career search partner, reCore Talent provides a platform that effectively connects these two worlds.</p>
										</div> 
									</div>
								</div> 
							</div> 
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3b">
										Who We Are
									</a> 
								</h4>
							</div>
							<div id="collapse3b" class="panel-collapse collapse">
								<div class="panel-body"> 
									<div class="row">
										<div class="col-md-12">
											<p>We understand the importance of acquiring talent not just for skills and experience, but
												also cultural and aspirational fit as well. The structure of our platform ensures the thorough examination of each professional, with the right experience and expertise, to
												every organization, within your local market. Our platform is designed to take a thorough
												approach to talent acquisition.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordionThree" href="#collapse3c">
										What We Do
									</a>
								</h4>
							</div>
							<div id="collapse3c" class="panel-collapse collapse">
								<div class="panel-body">
									<p>We serve our talent and businesses at the leadership level, in the most essential roles
										of an organization. We strive to contribute to an organization’s vision by targeting high
										performing talent and partner with candidates to identify the next step in their career.
										Our platform includes a resume, video, work-style assessment and professional photo
										as a way to measure a candidate’s success in terms of performance and the impacts
										made on current and previous roles, as well a culture fit for the organization overall.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4"> 
					<div class="video">
						<div class="embed-responsive embed-responsive-4by3">
							<iframe class="embed-responsive-item" src="//www.youtube.com/embed/upZJpGrppJA"></iframe>
						</div>
					</div>
				</div>
			</div>
		</section> 
		<section>
			<div class="row">
				<div class="col-md-4">
					<div class="heading">
						<h2>Our Professionals</h2>
					</div>
					<ul class="ul-icons">
						<li><i class="fa fa-check"></i>Human Resource Leaders</li>
						<li><i class="fa fa-check"></i>Sales/Marketing Leaders</li>
						<li><i class="fa fa-check"></i>Operations Leaders</li>
					</ul>
				</div>
				<div class="col-md-3">
					<div class="heading">
						<h2>Our Services</h2>
					</div>
					<ul class="ul-icons">
						<li><i class="fa fa-check"></i>Are Unique</li>
						<li><i class="fa fa-check"></i>Cost Effective</li>
						<li><i class="fa fa-check"></i>Accurate</li>
					</ul>
				</div>
				<div class="col-md-5">
					<div class="heading">
						<h2>Our Values</h2>
					</div>
					<ul class="ul-icons">
						<li><i class="fa fa-check"></i><p>reCore Talent is committed to identifying high performing talent in the local market,
								ready to engage your hiring staff today.<p></li>
						<li><i class="fa fa-check"></i><p>We are not a “résumé mill” and strive to make matches, not placements.<p></li>
						<li><i class="fa fa-check"></i><p>We provide a “high touch” process that is designed to build relationships and
								connections that last.</p></li>
					</ul>
				</div>
			</div>
		</section>
	</div>
	<!-- /#contact.container -->
</div>
@endsection

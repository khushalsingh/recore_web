<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img class="img-circle" src="{{URL::asset('/assets/img/profile.png')}}" class="user-image" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php // echo $_SESSION['user']['user_first_name'] . ' ' . $_SESSION['user']['user_last_name'];      ?></p>
                <!--<a href="javascript:;" id="online_status"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>
		<ul class="sidebar-menu">
			<li <?php echo Request::path() === 'my-dashboard' ? 'class="active"' : ''; ?>><a href="<?php echo url('/'); ?>/my-dashboard"><i class="fa fa-dashboard"></i> <span>my-dashboard</span></a></li>
			<li <?php echo Request::path() === 'user' ? 'class="active"' : ''; ?>>
                <a href="<?php echo url('/'); ?>/user"><i class="fa fa-users"></i> Users</a>
            </li>
            <li <?php echo Request::path() === 'contacts' ? 'class="active"' : ''; ?>>
                <a href="<?php echo url('/'); ?>/contacts"><i class="fa fa-feed"></i> Contact Us Feeds</a>
            </li>
			<li <?php echo Request::path() === 'add-resume' ? 'class="active"' : ''; ?>>
                <a href="<?php echo url('/'); ?>/add-resume"><i class="fa fa-plus-circle"></i> Add New Resume</a>
            </li>
			<li <?php echo Request::path() === 'user/talents' ? 'class="active"' : ''; ?>>
                <a href="<?php echo url('/'); ?>/user/talents"><i class="fa fa-users"></i> Talent Network</a>
            </li>
            <li <?php echo Request::path() === 'user/interviews' ? 'class="active"' : ''; ?>>
                <a href="<?php echo url('/'); ?>/user/interviews"><i class="fa fa-calendar"></i> Interview Schedules</a>
            </li>
		</ul>
    </section>
</aside>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php //echo isset($title) ? $title : (($this->router->method === 'index') ? '' : ucwords(str_replace('_', ' ', $this->router->method))) . ' ' . ucwords(str_replace('_', ' ', $this->router->class));   ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('/assets/css/base.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/css/skins/_all-skins.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('/assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
		<?php // if (is_file(public_path() . 'assets/css/' . $this->router->class . '/' . $this->router->method . '.css')) { ?>
		<link rel="stylesheet" href="<?php //echo public_path('/') . 'assets/css/' . $this->router->class . '/' . $this->router->method . '.css';   ?>" />
		<?php // } ?>
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>var base_url = '<?php echo url('/'); ?>';</script>
    </head>
    <body class="sidebar-mini skin-blue">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo url('/'); ?>my-dashboard" class="logo">
                    <span class="logo-mini">
                        <img src="{{URL::asset('/assets/img/logo-small.png')}}" />
                        RecoreTalent</span>
                    <span class="logo-lg">
                        <!--<img src="<?php // echo url('/');     ?>assets/img/logo-small.png" />-->
                        RecoreTalent</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle hidden-lg hidden-md hidden-sm" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{URL::asset('assets/img/profile.png')}}" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php //echo $_SESSION['user']['user_first_name'] . ' ' . $_SESSION['user']['user_last_name'];   ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{URL::asset('assets/img/profile.png')}}" class="img-circle" alt="User Image" />
                                        <p>
											<?php echo Auth::check() ? Auth::user()->user_first_name : 'Guest'; ?>
											<?php //echo $_SESSION['user']['user_first_name'] . ' - ' . $_SESSION['user']['group_name']; ?>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo url('/'); ?>/change_password" class="btn bg-purple">Change Password</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo url('/'); ?>/logout" class="btn bg-maroon">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
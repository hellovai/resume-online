<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Resume Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This shit is awesome">
    <meta name="author" content="Josh Cai, Vaibhav Gupta, Jonathan Zhu">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap-responsive.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/cosmo.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui-1.9.2.min.css" type="text/css" media="screen" />
    <script src="<?php echo base_url() ?>js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery-ui-1.9.2.min.js"></script>
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
</head>
<body>
  <!-- Navbar
    ================================================== -->
<div class="navbar navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?= site_url('site') ?>">Resume Builder</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?= site_url() . '/welcome/page/about'?>">About</a></li>
              <li><a href="<?= site_url() . '/welcome/page/contact'?>">Contact</a></li>
              <li><a href="<?= site_url() . '/welcome/page/contribute'?>">Contribute</a></li>
            </ul>
            	<? if(!isset($discrete))
                if(!$this->Common->confirm_login())
                {
		            $attributes = array('class' => "navbar-form pull-right");
					echo form_open('login/validate_credentials',$attributes);
					$attributes = array('name' => "email", "placeholder" => "Email", "class" => "span2", "autofocus" => ""); 
					echo form_input($attributes);
					$attributes = array("name" => "password", "placeholder" => "Password", "class" => "span2"); 
					echo form_password($attributes);
					
					//echo "<div>";
					
					$attributes = array("name" => "submit", "value" => "Login", "class" => "btn btn-primary"); 
					echo form_submit($attributes);
					echo form_close();
				}
				else 
				{ ?>
          		<div class="nav-collapse collapse">
            		<ul class="nav pull-right">
						<!--<li><?= anchor(site_url('site'), "Home", 'class="navbar-link"'); ?></li>-->
						<li class="dropdown">
							<a href='#' class="dropdown-toggle" data-toggle="dropdown">
								<?= $this->Common->user_info()->name ?><b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
						      <li><?= anchor(site_url('profile'), "Profile"); ?></li>
						      <li class="disabled"><?= anchor('#', "Privacy Settings",'rel="tooltip" data-placement="right" title="Coming Soon"'); ?></li>
						      <li><?= anchor(site_url('welcome/logout'), "Logout"); ?></li>
						    </ul>
						</li>
					</ul>
				</div>
				<? } ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div id="wrap">
<div class="container">
	<div class="container row-fluid">

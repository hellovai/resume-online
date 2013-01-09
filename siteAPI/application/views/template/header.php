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

	<link rel="stylesheet" href="<?php echo base_url();?>css/boostrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/boostrap-responsive.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/cosmo.min.css" type="text/css" media="screen" />
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
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            	
                <?php
                $attributes = array('class' => "navbar-form pull-right");
				echo form_open('login/validate_credentials',$attributes);
				$attributes = array('name' => "email", "placeholder" => "Email", "class" => "span2"); 
				echo form_input($attributes);
				$attributes = array("name" => "password", "placeholder" => "Password", "class" => "span2"); 
				echo form_password($attributes);
				$attributes = array("name" => "submit", "value" => "Login", "class" => "btn"); 
				echo form_submit($attributes);
				echo form_close();
	?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container">


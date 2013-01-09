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

	<link rel="stylesheet" href="<?php echo base_url();?>/css/boostrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/boostrap-responsive.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url();?>/css/cosmo.min.css" type="text/css" media="screen" />
	
	
</head>
<body>

<?php 
//add nav bar
?>

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
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

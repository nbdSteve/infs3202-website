<!DOCTYPE html>
<html>
<head>
	<title>DIGIMΛЯƬ</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?php echo site_url('user/feed'); ?>">DigiMart</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<?php
	$uri = $this->uri->segment(2);
	?>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					Account
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo site_url('user/account'); ?>">Settings</a>
					<a class="dropdown-item" href="<?php echo site_url('user/feed/logout'); ?>">Logout</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="<?php echo site_url('resources/latest'); ?>"
				   id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Resources
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Purchased Resources</a>
					<a class="dropdown-item" href="<?php echo site_url('resources/personal'); ?>">Your Resources</a>
				</div>
			</li>
			<li class="nav-item <?php if ($uri == 'upload') { ?>active<?php } ?>">
				<a class="nav-link" href="<?php echo site_url('resources/upload') ?>">Upload<span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="get" action="<?php echo site_url('admin/resources/index') ?>">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
				   value="<?php if ($this->input->get('keyword')) echo $this->input->get('keyword'); ?>">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
<div class="container">

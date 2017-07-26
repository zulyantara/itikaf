<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>M U T A N</title>

		<!-- Bootstrap -->
		<link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url("assets/master.css"); ?>">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

		<script src="<?php echo base_url("assets/plugins/jQuery/jquery-3.1.1.min.js"); ?>"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
		<!-- Jquery Validate -->
		<script src="<?php echo base_url("assets/plugins/validate/dist/jquery.validate.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/validate/dist/additional-methods.min.js"); ?>"></script>
	</head>

	<link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png"); ?>" />
		<body>
		<div class="container">

			<div class="tara-top visible-lg visible-md visible-sm">
				<ul class="nav navbar-nav navbar-right nav-top">
					<li><a href="<?php echo site_url("pendaftaran"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Pendaftaran</a></li>
					<?php
					if ($this->session->userdata('is_logged_in') === TRUE)
					{
						?>
						<li><a href="<?php echo base_url("auth/logout"); ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"> Logout</a></li>
						<?php
					}
					else
					{
						?>
						<li><a href="<?php echo base_url("cpanels"); ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"> Login</a></li>
						<?php
					}
					?>
				</ul>
			</div>
			<div class="tara-logo visible-lg visible-md">
				<div class="row">
					<div class="col-xs-2">
						<?php
						if ($row_logo !== FALSE)
						{
							?>
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("logo/".$row_logo->logo_ket); ?>" alt="" height="84"></a>
							<?php
						}
						?>
					</div>
					<div class="col-xs-10 col-md-10 col-sm-10">
						<nav class="navbar navbar-default navbar-tara">
							<div class="container-fluid">
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav navbar-right">
										<li><a href="<?php echo base_url(); ?>">HOME</a></li>
										<?php
										if ($res_tm !== FALSE)
										{
											foreach ($res_tm as $val_tm)
											{
												?>
												<li><a href="<?php echo $val_tm->tm_url; ?>"><?php echo ucwords($val_tm->tm_ket); ?></a></li>
												<?php
											}
										}
										?>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>

			<div class="visible-xs visible-sm">
				<nav class="navbar navbar-default no-radius">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">MUTAN COMMUNITY</a>
					    </div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav">
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li><a href="<?php echo base_url(); ?>">HOME</a></li>
								<li><a href="<?php echo site_url("pendaftaran"); ?>">PENDAFTARAN</a></li>
								<?php
								if ($res_tm !== FALSE)
								{
									foreach ($res_tm as $val_tm)
									{
										?>
										<li><a href="<?php echo $val_tm->tm_url; ?>"><?php echo ucwords($val_tm->tm_ket); ?></a></li>
										<?php
									}
								}

								?>
							</ul>
						</div>
					</div>
				</nav>
			</div>

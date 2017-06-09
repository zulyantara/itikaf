<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

			<div class="footer-main">
				<div class="row">
					<div class="col-md-12 hidden-xs hidden-sm">
						<?php
						if ($row_logo !== FALSE)
						{
							?>
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("logo/".$row_logo->logo_ket); ?>" alt="" height="84"></a>
							<?php
						}
						?>
						<!-- <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url("logo/logo.png"); ?>"></a> -->
					</div>
					<div class="tara-margin-top"></div>

					<div class="col-md-12 tara-margin-top">
						<?php
						$total_fhl = $this->auth_model->count_fheader();
						$res_fhl = $this->auth_model->get_fheader();

						if ($total_fhl > 0)
						{
							?>
							<div class="row">
								<?php
								foreach ($res_fhl as $val_fhl)
								{
									?>
									<div class="col-md-<?php echo 12/$total_fhl; ?>">
										<div class="panel panel-footer-tara">
											<div class="panel-heading">
												<h3class="panel-title"><b><?php echo ucwords($val_fhl->fhl_header); ?></b></h3>
											</div>
											<div class="panel-body">
												<ul class="tara-ul-link">
													<?php
													$res_flink = $this->auth_model->get_flink($val_fhl->fhl_id);
													if ($res_flink !== FALSE)
													{
														foreach ($res_flink as $val_fl)
														{
															?>
															<li><a href="<?php echo $val_fl->fl_link; ?>"><?php echo ucwords($val_fl->fl_ket); ?></a></li>
															<?php
														}
													}
													?>
												</ul>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>

			<footer class="footer footer-add">
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<ul class="uk-subnav uk-subnav-line">
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
							<?php
							if ($res_fa !== FALSE)
							{
								foreach ($res_fa as $val_fa)
								{
									?>
									<li><a href="<?php echo $val_fa->fa_url; ?>"><?php echo ucwords($val_fa->fa_ket); ?></a></li>
									<?php
								}
							}
							?>
						</ul>
						<ul class="uk-subnav uk-subnav-line">
							<li><strong>Copyright &copy; 2017-2018 MUTAN COMMUNITY </strong></li>
							<li>All rights reserved.</li>
						</ul>
					</div>
				</div>

		</footer>
		</div>
	</body>
</html>

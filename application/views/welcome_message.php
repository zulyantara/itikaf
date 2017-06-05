<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( $res_slider !== FALSE)
{
	?>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php
			for ($i=0; $i < $jml_slider; $i++)
			{
				$class_active = $i == 0 ? "class=\"active\"" : "";
				?>
				<li data-target="#carousel-example-generic" data-slide-to="0" <?php echo $class_active; ?>></li>
				<?php
			}
			 ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php
			foreach ($res_slider as $val_slider)
			{
				$class_active = $val_slider->slider_active == 1 ? "active" : "";
				?>
				<div class="item <?php echo $class_active; ?>">
					<img src="<?php echo base_url("slider/".$val_slider->slider_src); ?>" alt="<?php echo $val_slider->slider_alt; ?>" style="width:100%;">
					<div class="carousel-caption">
						<?php echo $val_slider->slider_alt; ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<?php
}
?>

<?php defined('_JEXEC') or die; ?>

<div class="cs-stats<?=$params->get('moduleclass_sfx')?>">
	<div class="container">
		<h6><?=$params->get('title')?></h6>
		<p><?=$params->get('subtitle')?></p>

		<div class="row-fluid">
			<div class="span4 module">
				<h1><?=$params->get('growth1')?></h1>
				<h4><?=$params->get('growth1_subtitle')?></h4>
			</div>
			<div class="span4 module">
				<h1><?=$params->get('growth2')?></h1>
				<h4><?=$params->get('growth2_subtitle')?></h4>
			</div>
			<div class="span4 module">
				<h1><?=$params->get('growth3')?></h1>
				<h4><?=$params->get('growth3_subtitle')?></h4>
			</div>
		</div>

		<a href="/contact-us" class="btn btn-white btn-wide">work with us</a>
	</div>
</div>
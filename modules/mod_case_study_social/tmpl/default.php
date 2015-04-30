<?php defined('_JEXEC') or die; ?>

<div class="cs-social<?=$params->get('moduleclass_sfx')?>">
	<div class="container">
		<h4><?=$params->get('title')?></h4>
		<p><?=$params->get('subtitle')?></p>

		<div class="row-fluid">
			<div class="span3 module">
				<a href="<?=$params->get('social1_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/<?=$params->get('social1_image')?>" alt="<?=$params->get('social1_title')?>" /></a>
				<h5><?=$params->get('social1_title')?></h5>
				<p><?=$params->get('social1_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('social2_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/<?=$params->get('social2_image')?>" alt="<?=$params->get('social2_title')?>" /></a>
				<h5><?=$params->get('social2_title')?></h5>
				<p><?=$params->get('social2_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('social3_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/<?=$params->get('social3_image')?>" alt="<?=$params->get('social3_title')?>" /></a>
				<h5><?=$params->get('social3_title')?></h5>
				<p><?=$params->get('social3_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('social4_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/<?=$params->get('social4_image')?>" alt="<?=$params->get('social4_title')?>" /></a>
				<h5><?=$params->get('social4_title')?></h5>
				<p><?=$params->get('social4_subtitle')?></p>
			</div>
		</div>
	</div>
</div>
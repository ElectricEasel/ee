<?php defined('_JEXEC') or die; ?>

<?php $header_type = $params->get('header_type'); ?>
<div class="cs-header-<?php echo $header_type . $params->get('moduleclass_sfx'); ?>">
	<div class="container">
		<?php if ($header_type == 'screens') : ?>
			<img class="laptop" src="/templates/ee/images/case-studies/header/<?=$params->get('laptop')?>" alt="" />
			<img class="phone" src="/templates/ee/images/case-studies/header/<?=$params->get('phone')?>" alt="" />
			<img class="tablet" src="/templates/ee/images/case-studies/header/<?=$params->get('tablet')?>" alt="" />
	    <?php else : ?>
			<img class="laptop" src="/templates/ee/images/case-studies/header/<?=$params->get('laptop')?>" alt="" />
			<img class="cover" src="/templates/ee/images/case-studies/header/<?=$params->get('cover')?>" alt="" />
			<img class="spread" src="/templates/ee/images/case-studies/header/<?=$params->get('spread')?>" alt="" />
		 <?php endif; ?>
	</div>
</div>
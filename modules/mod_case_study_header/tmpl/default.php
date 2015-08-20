<?php defined('_JEXEC') or die; ?>

<?php $header_type = $params->get('header_type'); ?>
<div class="cs-header-<?php echo $header_type . $params->get('moduleclass_sfx'); ?>">
	<div class="container">
		<?php if ($header_type == 'screens') : ?>
			<img class="laptop" src="/templates/ee/images/case-studies/header/<?=$params->get('laptop')?>" alt="" />
			<img class="phone" src="/templates/ee/images/case-studies/header/<?=$params->get('phone')?>" alt="" />
			<img class="tablet" src="/templates/ee/images/case-studies/header/<?=$params->get('tablet')?>" alt="" />
	    <?php elseif ($header_type == 'catalog') : ?>
			<img class="laptop" src="/templates/ee/images/case-studies/header/<?=$params->get('laptop')?>" alt="" />
			<img class="cover" src="/templates/ee/images/case-studies/header/<?=$params->get('cover')?>" alt="" />
			<img class="spread" src="/templates/ee/images/case-studies/header/<?=$params->get('spread')?>" alt="" />
		<?php else : ?>
			<img class="single" src="/templates/ee/images/case-studies/header/<?=$params->get('single')?>" alt="" />
			<img class="single-small" src="/templates/ee/images/case-studies/header/<?=$params->get('single-small')?>" alt="" />
		<?php endif; ?>
	</div>
</div>
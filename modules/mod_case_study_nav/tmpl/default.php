<?php defined('_JEXEC') or die; ?>

<div class="cs-nav<?=$params->get('moduleclass_sfx')?>">
	<div class="container">
		<div class="row-fluid">
			<div class="span5 view-all">
				<a href="/case-studies">
					<div class="grid-btn">
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
						<span class="grid-square"></span>
					</div>
					<h5>View All Case Studies</h5>
				</a>
			</div>
			<div class="span7 up-next">
				<a href="<?=$params->get('next_link')?>">
					<h5>Up Next:</h5>
					<h4><?=$params->get('next_title')?></h4>
					<span class="arrow"></span>
				</a>
			</div>
		</div>
	</div>
</div>
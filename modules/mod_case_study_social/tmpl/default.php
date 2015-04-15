<?php defined('_JEXEC') or die; ?>

<div class="cs-social">
	<div class="container">
		<h4><?=$params->get('title')?></h4>
		<p><?=$params->get('subtitle')?></p>

		<div class="row-fluid">
			<div class="span3 module">
				<a href="<?=$params->get('facebook_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/facebook.png" alt="Facebook" /></a>
				<h5>Facebook</h5>
				<p><?=$params->get('facebook_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('pinterest_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/pinterest.png" alt="Pinterest" /></a>
				<h5>Pinterest</h5>
				<p><?=$params->get('pinterest_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('twitter_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/twitter.png" alt="Twitter" /></a>
				<h5>Twitter</h5>
				<p><?=$params->get('twitter_subtitle')?></p>
			</div>
			<div class="span3 module">
				<a href="<?=$params->get('google_plus_link')?>" target="_blank"><img src="/templates/ee/images/case-studies/social/google_plus.png" alt="Google+" /></a>
				<h5>Google+</h5>
				<p><?=$params->get('google_plus_subtitle')?></p>
			</div>
		</div>
	</div>
</div>
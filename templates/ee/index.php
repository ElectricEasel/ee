<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}
?>

<?php
// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
$doc->addScript('templates/' .$this->template. '/js/template.js')
    ->addScript('templates/' .$this->template. '/vendor/modernizr.js');

// Add Stylesheets
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css')
    ->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css')
    ->addStyleSheet('templates/'.$this->template.'/css/fonts/font-awesome/css/font-awesome.css')
    ->addStyleSheet('templates/'.$this->template.'/vendor/owl-carousel/owl.carousel.css')
    ->addStyleSheet('templates/'.$this->template.'/vendor/owl-carousel/owl.theme.css')
    ->addStyleSheet('templates/'.$this->template.'/vendor/magnific-popup/magnific-popup.css')
    ->addStyleSheet('templates/'.$this->template.'/css/theme.css')
    ->addStyleSheet('templates/'.$this->template.'/css/theme-elements.css')
    ->addStyleSheet('templates/'.$this->template.'/css/theme-animate.css')
    ->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css')
    ->addStyleSheet('templates/'.$this->template.'/vendor/rs-plugin/css/settings.css')
    ->addStyleSheet('templates/'.$this->template.'/vendor/circle-flip-slideshow/css/component.css')
    ->addStyleSheet('templates/'.$this->template.'/css/skins/blue.css')
    ->addStyleSheet('templates/'.$this->template.'/css/custom.css')
    ->addStyleSheet('templates/'.$this->template.'/css/theme-responsive.css')
    ->addStyleSheet('templates/'.$this->template.'/css/fonts/font-awesome/css/font-awesome.min.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "span9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "span9";
}
else
{
	$span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
	$logo = '<img src="'. JUri::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
	<?php
	// Template color
	if ($this->params->get('templateColor'))
	{
	?>
	<style type="text/css">
		body.site
		{
			border-top: 3px solid <?php echo $this->params->get('templateColor');?>;
			background-color: <?php echo $this->params->get('templateBackgroundColor');?>
		}
		a
		{
			color: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
		.btn-primary
		{
			background: <?php echo $this->params->get('templateColor');?>;
		}
		.navbar-inner
		{
			-moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
			box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
		}
	</style>
	<?php
	}
	?>
    <!--[if IE]>
        <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie.css">
    <![endif]-->
    <!--[if lte IE 8]>
        <script src="templates/<?php echo $this->template ?>/vendor/respond.js"></script>
    <![endif]-->
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
			<!-- Header -->
			<header class="header" role="banner">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<img src="/templates/ee/images/logo.png" alt= "" /><?php if ($this->params->get('sitedescription')) { echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>'; } ?>
					</a>
					<div class="header-search pull-right">
						<jdoc:include type="modules" name="position-0" style="none" />
                        <div class="social-icons">
                            <ul class="social-icons">
                                <li class="facebook"><a href="http://www.facebook.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
                                <li class="twitter"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
                                <li class="googleplus"><a href="http://www.twitter.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Twitter">Twitter</a></li>
                                <li class="linkedin"><a href="http://www.linkedin.com/" target="_blank" data-placement="bottom" rel="tooltip" title="Linkedin">Linkedin</a></li>
                            </ul>
                        </div>
					</div>
                    <jdoc:include type="modules" name="nav-top" style="none" />
                </div>
			</header>
			<?php if ($this->countModules('position-1')) : ?>
			<nav class="navigation" role="navigation">
				<jdoc:include type="modules" name="position-1" style="none" />
			</nav>
			<?php endif; ?>
			<jdoc:include type="modules" name="banner" style="xhtml" />
			<div class="row-fluid">
				<?php if ($this->countModules('position-8')) : ?>
				<!-- Begin Sidebar -->
				<div id="sidebar" class="span3">
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="position-8" style="xhtml" />
					</div>
				</div>
				<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span;?>">
					<!-- Begin Content -->
					<jdoc:include type="modules" name="position-3" style="xhtml" />
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<jdoc:include type="modules" name="position-2" style="none" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('position-7')) : ?>
				<div id="aside" class="span3">
					<!-- Begin Right Sidebar -->
					<jdoc:include type="modules" name="position-7" style="well" />
					<!-- End Right Sidebar -->
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : '');?>">
            <p class="pull-right">
                <img src="/templates/ee/images/logo-circle.png" alt="" />
            </p>
			<jdoc:include type="modules" name="footer" style="none" />
			<p>
				&copy; <?php echo date('Y'); ?> Electric Easel, Inc. All rights reserved. | <a href="#">Privacy Policy</a>
			</p>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />

    <script src="templates/ee/vendor/jquery.js"></script>
    <script src="templates/ee/js/plugins.js"></script>
    <script src="templates/ee/vendor/jquery.easing.js"></script>
    <script src="templates/ee/vendor/jquery.appear.js"></script>
    <script src="templates/ee/vendor/jquery.cookie.js"></script>

    <script src="templates/ee/vendor/twitterjs/twitter.js"></script>
    <script src="templates/ee/vendor/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="templates/ee/vendor/rs-plugin/js/jquery.themepunch.revolution.js"></script>
    <script src="templates/ee/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="templates/ee/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
    <script src="templates/ee/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="templates/ee/vendor/jquery.validate.js"></script>

    <!-- Current Page Scripts -->
    <script src="templates/ee/js/views/view.home.js"></script>

    <!-- Theme Initializer -->
    <script src="templates/ee/js/theme.js"></script>

    <!-- Custom JS -->
    <script src="templates/ee/js/custom.js"></script>
</body>
</html>
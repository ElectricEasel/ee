<?php defined('_JEXEC') or die;

$active = JFactory::getApplication()->getMenu()->getActive();
$title = (! is_null($active)) ? $active->title : '';

switch ($title) {
    case "What We Do":
        $sub = "<span>//</span> Explore Our Capabilities";
        break;
    default:
        $sub = "";
}

?>

<div id="interior-banner">
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <h2><?php echo $sub; ?></h2>
    </div>
</div>

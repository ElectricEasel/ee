<?php defined('_JEXEC') or die;

if (($this->error->getCode()) == '404') {
header('Location: /page-not-found');
exit;
}

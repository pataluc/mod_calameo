<?php
/**
 * Module Calaméo
 * 
 */
 
// no direct access
defined('_JEXEC') or die;

// Include the class of the syndicate functions only once
require_once(dirname(__FILE__).'/helper.php');


// Static call to the class
$publications = modCalameoHelper::getPublications($params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require(JModuleHelper::getLayoutPath('mod_calameo'));

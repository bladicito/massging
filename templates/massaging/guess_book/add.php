<?php

if (! defined('WB_PATH')) { die('Cannot access this file directly'); }
/* -------------------------------------------------------- */
// --- import needed objects ---------------------------------
$oReg  = WbAdapter::getInstance();  // get the instance of the active registry
// --- import needed global vars -----------------------------

//  here you can set/get basical settings for this instance
$oAddonReg = new AddonRegistry($oReg, basename(__DIR__), array('instance'=>$oReg->InstanceId));
$oAddonReg->setEntry('Template', 'MyFirstOwnTemplate');

// --- end of file -------------------------------------------
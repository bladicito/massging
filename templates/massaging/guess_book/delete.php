<?php


if (! defined('WB_PATH')) { die('Cannot access this file directly'); }
/* -------------------------------------------------------- */
// --- import needed objects ---------------------------------
$oReg  = WbAdapter::getInstance();  // get the instance of the active registry
// --- import needed global vars -----------------------------

// -----------------------------------------------------------
/* ***********************************************************
 *                                                           *
 * put here all additional code to clean up this instance    *
 *                                                           *
 * **********************************************************/
// --- finaly remove record from table `mod_helloworld_settings` ------
$sql = 'DELETE FROM `'.$oReg->Db->TablePrefix.'mod_guess_book_settings` '
    . 'WHERE `id`='.$oReg->InstanceId;
if (! $oReg->Db->doQuery($sql)) {
    // use string var $sErrorMessage for returning of error messages!
    $sErrorMessage = $oReg->Db->getError();
}
// --- end of file -------------------------------------------
<?php
if (! defined('WB_PATH')) { die('Cannot access this file directly'); }

$oReg = WbAdaptor::getInstance();


$oSqlStruct = new SqlImport($oReg->Db, __DIR__.'/install-struct.sql');
$oSqlStruct->doImport(__FILE__);

<?php
require_once 'Tool.class.php';

$tool = new Tool($db);

/**
$tool->update_StoreTime("9555");
$tool->update_StoreTime("9555");

$tool->update_StoreTime("9566");
$tool->update_StoreTime("9566");
$tool->update_StoreTime("9566");

$tool->update_StoreTime("9604");
**/

/**/
$tool->update_POSTime("9555",1);
$tool->update_POSTime("9555",3);

$tool->update_POSTime("9566",2);
$tool->update_POSTime("9566",4);
$tool->update_POSTime("9566",6);

$tool->update_POSTime("9604",2);
/**/


?>
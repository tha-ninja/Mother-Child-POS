<?php
/* Database config */
require_once('env.php');
$db_host		= HOST;
$db_user		= USER;
$db_pass		= PASS;
$db_database	= DB; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
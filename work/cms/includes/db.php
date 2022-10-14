<?php ob_start(); ?>
<?php 

$db['db_host'] = "savvyschemecom.ipagemysql.com";
$db['db_user'] = "savvy";
$db['db_pass'] = "591548";
$db['db_name'] = "cms";

foreach($db as $key => $value){
define(strtoupper($key), $value);  
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection){
    die("Failed to connect to Database");
}

?>
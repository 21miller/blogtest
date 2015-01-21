<?php
//include config
require_once('../includes/config.php');

//logout user
$user->Logout();
header('Location: index.php');

?>
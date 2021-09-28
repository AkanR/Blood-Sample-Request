
<?php require './dbfunctions/config.php';
session_unset();
session_destroy();
$location = "./index.php";
redirect($location);
?>
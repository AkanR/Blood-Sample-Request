<?php require './dbfunctions/config.php'; ?>
<?php 
usertypesession();
if($_SESSION['usertype'] == "hospital")
{
    require_once './hospitalheader.php';
}
else
{
    require_once './header.php';
}
if($_SESSION['usertype'] == "user")
{
        set_message("No access");
        $location = "./requestsample.php";
        redirect($location); 
}
elseif($_SESSION['usertype'] == "hospital")
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests</title>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <center><h1>View Requests</h1></center>
            <div class="row">
                <?php display_requests(); ?>
            </div>
    </div>
</body>
</html>
<?php
}
else
{
    set_message("No access");
    $location = "./index.php";
    redirect($location);
}
?>
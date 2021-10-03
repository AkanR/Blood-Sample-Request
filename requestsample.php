<?php require './dbfunctions/config.php';  
usertypesession();
if($_SESSION['usertype'] == "user")
{
    require_once './userheader.php';
}
else
{
    require_once './header.php';
}
if($_SESSION['usertype'] == "hospital")
{
        set_message("No access");
        $location = "./addsamples.php";
        redirect($location); 
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Sample</title>
</head>
<body>
<div class="container" style="margin-top: 40px;">
    <center>
        <h1>Available Samples</h1>
        <?php display_message();?>
    </center>
        <div class="row">
        <?php display_availablesamples(); ?>
        </div>
    </div>
</body>
</html>
<?php
}
if(isset($_POST['requestsample'])) 
{ 
    $sampleid = $_POST['sampleid'];
    $userid = $_POST['userid'];
    $hospitalid = $_POST['hospitalid'];
    requestsample($userid,$hospitalid,$sampleid);
    
}
?>
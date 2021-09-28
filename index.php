<?php require './dbfunctions/config.php'; ?>
<?php
usertypesession();
if($_SESSION['usertype'] == "hospital")
{
        $location = "./addsamples.php";
        redirect($location); 
}
elseif($_SESSION['usertype'] == "user")
{
    $location = "./requestsample.php";
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
    <title>Blood Sample</title>
</head>
<body style="background-image: url('./bgimg.jpeg'); background-repeat: no-repeat; background-size: cover;">
<?php require 'header.php'; ?>

<center>
       <div class="container">
       <div style="margin-top: 70px;">
       <?php display_message();?>
           <h1 style="color: black; font-size: 50px;">WELCOME TO Blood Bank</h1>
           <h1 style="color: black; font-size: 40px;">Save a Life</h1>
       </div>
       </div>
       
   </center>
    <div>

    </div>
</body>
</html>
<?php
}
?>
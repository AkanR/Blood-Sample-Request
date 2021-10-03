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
    <title>Add samples</title>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-xs-6">
                <div>
                    <center>
                    <?php display_message();?>
                        <h1>Add Samples</h1>
                        <form action="" method="post">
                            <div class="form-group">
                            <br><p>Please select type of blood group available:</p>
                                <div class="form-group">
                                    <input  type="radio" id="bloodChoice1"
                                    name="bloodgroup" value="A+">
                                    <label for="bloodChoice1">A+</label>

                                    <input type="radio" id="bloodChoice2"
                                    name="bloodgroup" value="B+">
                                    <label for="bloodChoice2">B+</label>

                                    <input type="radio" id="bloodChoice3"
                                    name="bloodgroup" value="AB+">
                                    <label for="bloodChoice3">AB+</label>

                                    <input type="radio" id="bloodChoice4"
                                    name="bloodgroup" value="A-">
                                    <label for="bloodChoice4">A-</label>

                                    <input type="radio" id="bloodChoice5"
                                    name="bloodgroup" value="B-">
                                    <label for="bloodChoice5">B-</label>

                                    <input type="radio" id="bloodChoice6"
                                    name="bloodgroup" value="AB-">
                                    <label for="bloodChoice6">AB-</label>
                                </div>
                            <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="addsample" value="Add Sample" style="background-color: #17a2b8; color:white; width:250px;">
                        </form>
                    </center>
                    
                </div>
            </div>
                <?php
                    //adding samples
                    if(isset($_POST['addsample'])) {
                        $availablesample = $_POST['bloodgroup'];
                        $hospitalid = $_SESSION['id'];
                        addsample($hospitalid,$availablesample);
                        set_message("A sample is added, now users can request for it");
                    }
                ?>
            <div class="col-lg-6 col-md-6 col-xs-6">
            </div>
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
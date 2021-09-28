<!-- user registration page -->
<?php require './dbfunctions/config.php'; ?>
<?php require_once 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
<div class="container">
      <br>
    <div class="row">
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
        <div class=" col-lg-4 col-md-6 col-sm-4 col-xs-4">
            <center>
             <div class="card">
                <div class="card-header">
                        <p style="font-size:30px;">Register as a Customer</p>
                </div>
                <div class="card-body">
                    <form action="" method="Post">
                        <?php display_message(); ?>
                            <div class="form-group">
                            <input class="form-control" type="text" placeholder="Name" name="name" required="true">
                            </div>
                            <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" required="true">
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="password" placeholder="Password" id="myinput" name="password" required="true">
                            </div>
                            <div class="form-group">
                            <input type="checkbox" onclick="myFunction()">&nbsp;Show password
                            </div>
                            <div class="form-group">
                            <input  class="form-control"  type="tel" placeholder="Contact No" name="contactno" required="true" pattern=".{10,}">
                            <br><p>Please select your blood group:</p>
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
                          <input class="form-control" type="submit" class="btn btn-info" id="btn-info" name="register" value="Register" style="background-color: #17a2b8; color:white;">
                    </form><br>
                    Already Registered? <a href="./user-login.php" class="btn btn-info" id="btn-info">Login Now</a>
                </div>
            </div>
            </center>
        </div>
        <div class=" col-lg-4 col-md-3 col-sm-4 col-xs-4">
        </div>
    </div>
</div>
</body>
</html>
<script>
    function myFunction()
    {
            var x = document.getElementById("myinput");
                    if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
    }
</script>
<?php
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contactno'];
    $bloodgroup = $_POST['bloodgroup'];
    userregistration($name,$emailid,$password,$contact,$bloodgroup);
}
?>
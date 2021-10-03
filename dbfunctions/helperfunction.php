<?php

//function for redirecting pages
function redirect($location){
    header("location:$location");
}

//funcion for setting a message
function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";


    }
}

//function for displaying a message
function display_message() {

if(isset($_SESSION['message'])) {
      $mess=<<<DELIMETER
        <br><br>
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{$_SESSION['message']}</strong>
        </div>
DELIMETER;
echo $mess;     
unset($_SESSION['message']);
}}

//function for sql query
function query($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}

//function for executing sql query
function confirm($result){
    global $conn;
    if(!$result){
        die("Query failed".mysqli_errno($conn));
    }
}

//function for sql fetch array
 function fetch_array($send_query){
     return mysqli_fetch_array($send_query);
 }

//escaping string characters in sql
function escape($string)
 {
     
      global $conn;
     return mysqli_real_escape_string($conn,$string);
 }
//usertype session function
function usertypesession()
{
    if(isset($_SESSION['id']))
    {
        $query=  query("select * from users where id='{$_SESSION['id']}'");
        confirm($query);
        $row = fetch_array($query);
        $_SESSION['usertype']=$row['usertype'];
    }
    else{
        $_SESSION['usertype']="";
    }  
}

 //user registration function
function userregistration($name,$emailid,$password,$contact,$bloodgroup)
{
    $query= query("SELECT emailid from users where emailid='".$emailid."'");
    confirm($query);
    $row = fetch_array($query);
    $user = "user";
    if($emailid==$row['emailid'])
    {
      set_message("Sorry this email id is already regsitered with us!.");
      $location = "./user-login.php";
      redirect($location);  
    }
    else
    { 
        $query2= query("INSERT into users (name, emailid,password,phone,usertype,bloodgroup) values ('$name','$emailid','$password','$contact','$user','$bloodgroup')");
        confirm($query2);
        set_message("Congratulation! Account creation successful, login with your email id");
        $location = "./user-login.php";
        redirect($location); 
    }
}

 //hospital registration function
 function hospitalregistration($name,$emailid,$password,$contact)
 {
     $query= query("SELECT emailid from users where emailid='".$emailid."'");
     confirm($query);
     $row = fetch_array($query);
     $user = "hospital";
     if($emailid==$row['emailid'])
     {
       set_message("Sorry this email id is already regsitered with us!.");
       $location = "./user-login.php";
       redirect($location);  
     }
     else
     { 
         $query2= query("INSERT into users (name, emailid,password,phone,usertype) values ('$name','$emailid','$password','$contact','$user')");
         confirm($query2);
         set_message("Congratulation! Account creation successful, login with your email id");
         $location = "./user-login.php";
         redirect($location); 
     }
 }

//login
function login($email,$password)
{
    $result = query("SELECT * FROM users WHERE (emailid='" . $email. "') and password = '". $password."'");
    confirm($result);
    $row = fetch_array($result);
    if($row['emailid']==$email)
    {
        $_SESSION["id"]=$row['id'];

        if($row['usertype'] == "user")
        {
            $_SESSION['usertype'] = $row['usertype'];
            $location = "./requestsample.php";
            redirect($location);
        }  
        if($row['usertype'] == "hospital")
        {
            $_SESSION['usertype'] = $row['usertype'];
            $location = "./addsamples.php";
            redirect($location);
        }    
    } 
    else
   {
        $message = "Invalid  email or Password!";
        set_message($message);
        $location = "./customer-login.php";
        redirect($location);
    } 
}

// add samples
function addsample($hospitalid,$availablesample)
{
    $query= query("INSERT into sample (hospitalid,availablesample) values ('$hospitalid','$availablesample')");
    confirm($query);
    
}
//display available samples
function display_availablesamples()
{
    usertypesession();
    $query=query("SELECT a.*, b.* FROM sample a, users b WHERE a.hospitalid = b.id");
    confirm($query);
    while($row = fetch_array($query))
     {
         $displaysamples= <<<DELIMETER
                 
        <div class="col-lg-4" style="margin-top:50px">
              <div class="jumbotron">
                <p><b>Blood Type - {$row['availablesample']}</b></p>
                <p><b>Hospital Name - {$row['name']}</b></p>                
DELIMETER;      
if(isset($_SESSION['id']))
{
    $displayhiddeninputs = <<<DELIMETER
    <form action="" method="post">
    <input type="hidden" name="hospitalid" value={$row['id']}>
    <input type="hidden" name="userid" value={$_SESSION['id']}>
    <input type="hidden" name="sampleid" value={$row['sample_id']}>
    <input class="form-control" type="submit" class="btn btn-info" name="requestsample" value="Request Sample" style="background-color: #17a2b8; color:white;">
    </div>
    </div>
    DELIMETER;
}
else{
    $displayhiddeninputs = <<<DELIMETER
    <a href="./user-login.php" class="btn btn-info" style="background-color: #17a2b8; color:white;">Request Sample</a>
    </div>
    </div>
    DELIMETER;
}
          echo $displaysamples;
          echo $displayhiddeninputs;
     }
}

//requesting samples and storing in db
function requestsample($userid,$hospitalid,$sampleid)
{
    $query= query("INSERT into requests (s_id,h_id,u_id) values ('$sampleid ','$hospitalid','$userid')");
    confirm($query);
    set_message("Request has been received!");

}

function display_requests()
{
    $hospital_id = $_SESSION['id'];
    $query=query("select *
    from
        requests a
            inner join
        sample b
            on a.s_id = b.sample_id AND a.h_id = b.hospitalid
            inner join 
        users c
            on a.u_id = c.id");
    confirm($query);
    while($row = fetch_array($query))
    {
        $displayrequests= <<<DELIMETER
                 
        <div class="col-lg-4" style="margin-top:50px">
              <div class="jumbotron">
                <p><b>Name of Requester - {$row['name']}</b></p>
                <p><b>Emailid of Requester - {$row['emailid']}</b></p>
                <p><b>Contact of Requester - {$row['phone']}</b></p>
                <p><b>Blood Sample Requested - {$row['availablesample']}</b></p>
                </div>
        </div>               
DELIMETER; 
echo $displayrequests;
    }
}
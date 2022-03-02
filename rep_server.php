<?php

$db = mysqli_connect("localhost", "root", "", "cityzen");

if($db === false){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$jobtitle = $_POST['jobtitle'];

//generate vkey
$vkey = md5(time() .$username);

$insert = "INSERT INTO representatives VALUES 
    ('$username', '$fullname', '$email', '$mobileno', '$jobtitle', '$vkey')";

if(mysqli_query($db, $insert)){
    //send email
    $to = $email;
    $subject = "cityZen Email Verification";
    $message = "<a href='http://localhost/cityzen/verify.php?vkey=$vkey'>Click Here to Verify Yourself as a Representative</a>";
    $headers = "From: ctznprjct@yahoo.com" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;Charset=utf8" . "\r\n";

    mail($to,$subject,$message,$headers);

    header('location:new_rep.php');
} else{
    echo $db->error;
}

mysqli_close($db);
//header("location: new_rep.php");

//add alert dialog to inform user that rep is added


?>

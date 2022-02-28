<?php

$conn = mysqli_connect("localhost", "root", "", "cityzen");

if($conn === false){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$username = $_POST['username'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$jobtitle = $_POST['jobtitle'];

$sql = "INSERT INTO representatives VALUES ('$username', '$fullname', '$email', '$mobileno', '$jobtitle')";

if(mysqli_query($conn, $sql)){
    echo "data stored successfully";
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
header("location: new_rep.php");

//add alert dialog to inform user that rep is added


?>
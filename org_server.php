<?php

$db = mysqli_connect("localhost", "root", "", "cityzen");

if(!$db){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$org_id = $_POST['org_id'];
$name = $_POST['name'];
$address = $_POST['address'];

$insert = "INSERT INTO organizations VALUES ('$org_id', '$name', '$address')";

if(mysqli_query($db, $insert)){
    echo "Success";
} else{
    echo $db->error;
}

mysqli_close($db);
header("location: new_org.php");

//add alert dialog to inform user that rep is added


?>

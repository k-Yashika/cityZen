<?php

$conn = mysqli_connect("localhost", "root", "", "cityzen");

if($conn === false){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$name = $_POST['name'];
$address = $_POST['address'];

$sql = "INSERT INTO organizations VALUES ('$name', '$address')";

if(mysqli_query($conn, $sql)){
    echo "data stored successfully";
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}

mysqli_close($conn);
header("location: new_org.php");

//add alert dialog to inform user that rep is added


?>

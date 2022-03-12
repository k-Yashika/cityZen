<?php

$db = mysqli_connect("localhost", "root", "", "cityzen");

if(!$db){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$appeal_id = $_POST['appeal_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];

$insert = "INSERT INTO appeals VALUES ('$appeal_id', '$start_date', '$end_date', '$description')";

if(mysqli_query($db, $insert)){
    echo "Success";
} else{
    echo $db->error;
}

mysqli_close($db);
header("location: new_appeal.php");


?>

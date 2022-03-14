<?php

$db = mysqli_connect("localhost", "root", "", "cityzen");

if(!$db){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$contribution_id = $_POST['contribution_id'];
$s_description = $_POST['s_description'];
$value = $_POST['value'];
$recieved_date = $_POST['received_date'];

$insert = "INSERT INTO contributions VALUES ('$contribution_id', '$s_description', '$value', '$received_date')";

if(mysqli_query($db, $insert)){
    echo "Success";
} else{
    echo $db->error;
}

mysqli_close($db);
header("location: selected_appeal.php");


?>

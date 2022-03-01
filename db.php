<?php
    //access to the database
    $dbServername="localhost";
    //deafult database username
    $dbUSername="root";
    //since database has no password, just put empty string lah
    $dbPassword="";
    //name of the created database (pcvs_db)
    $dbName="pcvs_db";

    //The selected database has been retrieved to this variable $conn to store or retrieve data(easier way)
    $conn=mysqli_connect($dbServername, $dbUSername, $dbPassword, $dbName);

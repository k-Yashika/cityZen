<?php
 ini_set('display_errors', '1');
 ini_set('display_startup_errors', '1');
 error_reporting(E_ALL);

 $conn = mysqli_connect("localhost", "root","");
 $db = mysqli_select_db($conn, "cityZen");
 $Errors = array();

 if(count($_POST) > 0){
     if(isset($_POST["btnSubmit"])){
         $date= isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
         $cash = isset($_POST['cash']) ? mysqli_real_escape_string($conn, $_POST['cash']) : '';
         $goods = isset($_POST['goods']) ? mysqli_real_escape_string($conn, $_POST['goods']) : '';
     }
     
     if(empty($date)){
         $Errors['date'] = 'Date is empty.';
     }
 
     if(empty($cash)){
         $Errors['cash'] = 'Cash amount is empty.';
     }
 
     if(empty($goods)){
         $Errors['goods'] = 'Goods is empty.';
     }
 
 
     if(count($Errors) == 0){
         $queryInsert = "INSERT INTO disbursement (`date`, `cash`, `goods`) VALUES ('$date', '$cash', '$goods')";
 
         if(mysqli_query($conn, $queryInsert)){
             header("location: recordDisbursement.php?msg=success");
         } else{
             echo $db->error;
         }
         mysqli_close($db);
     }
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    

    <title>Record Disbursement</title>

    <style>

body {
        background-image: url('img/');
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: 100% 100%;
      }
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
        body, html {
            height: 100%;
            line-height: 1.8;
            text-align: center;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        .w3-container{
          margin-top: 50px;
          padding: 16px;
        }

        input[type="submit"], input[type="text"]{
          display:block;
          margin-left: 380px;
          margin-left: 240px;
        }

        input[type="text"]{
            color: black;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 50%;
        }
        input[type="submit"]{
          background-color: #ccc;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          width: 50%;
        }

        input[type="submit"]:hover{
          background-color: #FFC300;
        }
      </style>

  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
      <!--to contain contents in the container in the nav bar-->
      <div class="container">
        <!--Put title and image of the website-->
        <a href="#" class="navbar-brand mb-0 h1">
          <img src="img/cityZen.png" width="65" height="auto" alt="imageWeb">
          CityZen
        </a>

        <!--
          To toggle the navigation bar
          data-toggle: class that will be applying toggle to 
          data-target: target will be that ID created in div tag below
          add accessible tags: aria-controls, expanded, label
        -->
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler">
          <!--Add icon for the toggle button-->
          <span class="navbar-toggler-icon"></span>

        </button>
        <!--to ensure that this tag to have responsive design to make nav bar function properly-->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <!--Create dropdown toggle-->
            <li class="nav-item active dropdown">

              <!--To dropdown the items-->
              <a href="recordDisbursement.php" class="nav-link">
                Record Disbursement
              </a>

            </li>

            <li class="nav-item">
              <a href="login.php" class="nav-link">
                Login
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  

<br><br><br>
<br>

<h1>Record Disbursement</h1>


<form class="Form" action="recordDisbursement.php" method="POST">
        <div class="w3-center">
            <label type="text" name="recordDisbursement"></p>
            <p>Date: <input type="date" name="date" required></p>
            <p>Cash: <input type="number" name="cash" required></p>
            <p>Goods: <textarea name="goods" cols="100" rows="8" required></textarea></p>
            <input class="submit" type="submit" value="Submit" name="btnSubmit">
        </div>
      </form>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
  </body>
</html>
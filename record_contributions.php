<?php
 ini_set('display_errors', '1');
 ini_set('display_startup_errors', '1');
 error_reporting(E_ALL);

  $conn = mysqli_connect("localhost", "root","");
  $db = mysqli_select_db($conn, "cityZen");

  $Errors = array();
  $row = array();
  $id = 0;
  if(count($_POST) > 0){
    if(isset($_POST['btnSubmit'])){
      $id = isset($_POST['radID']) ? mysqli_real_escape_string($conn, $_POST['radID']) : 0;

      if($id > 0){
        $query = "SELECT * FROM `appeals` WHERE `ID` = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        //extract($row);
      }
    }

    if(isset($_POST['btnSubmit2'])){
      $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
      $value = isset($_POST['value']) ? mysqli_real_escape_string($conn, $_POST['value']) : '';
      //$received_date = isset($_POST['received_date']) ? mysqli_real_escape_string($conn, $_POST['received_date']) : '';

      if($description == ''){
        $Errors['description']  = 'Description is empty';
      }

      if($value == ''){
        $Errors['value'] = 'Value is empty';
      }

      if(count($Errors) == 0){
        $queryInsert = "INSERT INTO `contributions` (`description`, `value`) VALUES ('$description', '$value')";

        if(mysqli_query($conn, $queryInsert)){
            header("location: record_contributions.php?msg=success");
        } else{
            echo $db->error;
        }
        mysqli_close($db);
    }
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Record Contributions</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

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

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        
    </head>
    <body>
        <?php
          if(isset($_GET['msg']) && $_GET['msg'] == 'success'){
            echo '<script type="text/javascript">alert("Record Inserted Successfully.");</script>';
          }
        ?>
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
      <!--to contain contents in the container in the nav bar-->
      <div class="container">
        <!--Put title and image of the website-->
        <a href="#" class="navbar-brand mb-0 h1">
          <img src="img/cityZen.png" width="65" height="auto" alt="imageWeb">
          cityZen
        </a>
         
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
              <a href="new_appeal.php" class="nav-link">
                Organize Aid Appeal
              </a>
            </li>

            <li class="nav-item">
              <a href="record_contributions.php" class="nav-link">
                Record Contribution
              </a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                Logout
              </a>
            </li>
          </ul>
      </div>
      </div>
    </nav>
    <br>
    <div class="w3-container" id="selected-appeal">
        <h1 class="w3-center">Record Contributions</h1>
    
        <?php
          if($row){
            echo 'ID: ' . $row["ID"] . ' - ' .
                 'Start Date: ' . $row["start_date"] . ' - ' .
                 'End Date: ' . $row["end_date"] . ' - ' .
                 'Description: ' . $row["description"];
          }
        ?>
    </div>

    <form class="s_appealForm" action="record_contributions.php" method="POST">
        <div class="w3-center">
       
            <label type="text" name="contribution_id"></p>
            <p>Estimated Value<input type="text" name="value" style="margin: 0 auto !important" require></p>
            <p>Description: <br><textarea name="description" cols="100" rows="8" required></textarea></p>
            
            <input class="submit" name="btnSubmit2" type="submit" value="Submit" style="margin: 0 auto !important">
    </div>
    </form>
    
   <!--     
        show appeal start and end date
        
    -->
    </body>
  </html>

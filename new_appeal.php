<!--organize aid appeal: use case 3-->
<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $conn = mysqli_connect("localhost", "root","");
    $db = mysqli_select_db($conn, "cityZen");
    $Errors = array();

    if(count($_POST) > 0){
        if(isset($_POST["btnSubmit"])){
            $start_date = isset($_POST['start_date']) ? mysqli_real_escape_string($conn, $_POST['start_date']) : '';
            $end_date = isset($_POST['end_date']) ? mysqli_real_escape_string($conn, $_POST['end_date']) : '';
            $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
        }
        
        if(empty($start_date)){
            $Errors['start_date'] = 'Start Date is empty.';
        }
    
        if(empty($end_date)){
            $Errors['end_date'] = 'End Date is empty.';
        }
    
        if(empty($description)){
            $Errors['description'] = 'Description is empty.';
        }
    
        if($start_date > $end_date){
            $Errors['error_date'] = 'END DATE MUST BE AFTER START DATE';
        }
    
        $today = date('Y-m-d', time());
        if($start_date < $today){
          $Errors['less_today'] = 'START DATE CANNOT BE BEFORE CURRENT DATE';
        }
        
        if(count($Errors) == 0){
            $queryInsert = "INSERT INTO appeals (`start_date`, `end_date`, `description`) VALUES ('$start_date', '$end_date', '$description')";
    
            if(mysqli_query($conn, $queryInsert)){
                header("location: new_appeal.php?msg=success");
            } else{
                echo $db->error;
            }
            mysqli_close($db);
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Appeal</title>

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
        <!--
        <script>
          $( function() {
          $( "#datepicker" ).datepicker();});

          $( function() {
          $( "#datepicker2" ).datepicker();});
        </script> 
          -->
    </head>
    </head>
    <body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
      <!--to contain contents in the container in the nav bar-->
      <div class="container">
        <!--Put title and image of the website-->
        <a href="#" class="navbar-brand mb-0 h1">
          <img src="img/cityZen.png" width="65" height="auto" alt="imageWeb">
          cityZen
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
              <a href="new_appeal.php" class="nav-link">
                Organize Aid Appeal
              </a>
            </li>

            <li class="nav-item">
              <a href="signup.php" class="nav-link">
                Register Applicant
              </a>
            </li>

            <li class="nav-item">
              <a href="record_contribution.php" class="nav-link">
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

    <div class="w3-container" id="add-appeal">
        <h1 class="w3-center">New Appeal</h1>
        <h4 class="w3-center">Record a New Aid Appeal</h4>
    </div>
    <?php  if (count($Errors) > 0) : ?>
      <div class="error">
        <?php foreach ($Errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php  endif ?>
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == 'success'){
        echo '<script type="text/javascript">
                alert("Record Inserted!");
                window.location.href = "new_appeal.php";
              </script>';
      }
    ?>
      <form class="appealForm" action="new_appeal.php" method="POST">
        <div class="w3-center">
            <label type="text" name="appeal_id"></p>
            <p>Start Date: <input type="date" name="start_date" required></p>
            <p>End Date: <input type="date" name="end_date" required></p>
            <p>Description: <br><textarea name="description" cols="100" rows="8" required></textarea></p>
            <input class="submit" type="submit" value="Submit" name="btnSubmit" style="margin: 0 auto !important">
        </div>
      </form>
    </body>
    </html>
<?php
  $conn = mysqli_connect("localhost", "root","");
  $db = mysqli_select_db($conn, "cityZen");

    $org = '';
    if(isset($_GET['org'])){
        $org = mysqli_real_escape_string($conn, $_GET['org']);
    }

    if($org == ''){
        header("Location: manage_org.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Representative</title>
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

        .dropdown, .addbtn{
          text-align: center;
        }

        input[type="submit"], input[type="text"], input[type="email"]{
          display:block;
          margin-left: 380px;
        }

        input[type="text"], input[type="email"]{
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

        input[type="submit"]:hover, .addbtn:hover{
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
          <img src="img/cityZen.png" width="45" height="auto" alt="imageWeb">
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
              <a href="manage_org.php" class="nav-link">
                Manage Organization
              </a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                Logout
              </a>
            </li>
          </ul>
        </div>
        
        <!--Create search bar-->
        <!--
          form-control: create some of the stylings for the input
        
        <form action="#" class="d-flex">
          <input type="text" class="form-control me-2" name="search">
          <button type="submit" class="btn btn-outline-success">
            Search
          </button>
        </form>
      -->
      </div>
    </nav>
    <div class="w3-container" id="add-rep">
        <h1 class="w3-center"><?php echo $org; ?></h1>
        <h4 class="w3-center">Record a New Organization Representative</h4>
    </div>
      <form class="repForm" action="rep_server.php" method="POST">
        <div class="w3-center">
            <p>Username <input type="text" name="username" required></p>
            <p>Full Name <input type="text" name="fullname" required></p>
            <p>Email <input type="text" name="email" required></p>
            <p>Mobile Number <input type="text" name="mobileno" required></p>
            <p>Job Title <input type="text" name="jobtitle" required></p>
            <input class="submit-btn" type="submit" value="Submit">
        </div>
      </form>
  </body>
  </html>

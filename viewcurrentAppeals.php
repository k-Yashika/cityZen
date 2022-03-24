<!--view current appeal: use case 4--> 
<?php
  $conn = mysqli_connect("localhost", "root","");
  $db = mysqli_select_db($conn, "cityZen");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Current Appeals</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">

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
  padding: 10px 160px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
              <a href="viewcurrentAppeals.php" class="nav-link">
                View Current Appeals
              </a>
            </li>
              
              <!--To dropdown the items-->
              

            <li class="nav-item">
              <a href="signup.php" class="nav-link">
                Register Applicant
              </a>
            </li>

            

            

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                Logout
              </a>
            </li>
          </ul>
        </div>
        
        <!--&&&&&Create search bar-->
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
    <br><br>
    <div class="w3-container" id="add-appeal">
        <h2 class="w3-center">View Current Appeals</h2>
    </div>

      <form class="appealForm" action="appeal_server.php" method="POST">
        <div class="w3-center">
            <label type="text" name="appeal_id"></p>
            <p>Start Date: <input type="date" name="start_date" required></p>
            <p>End Date: <input type="date" name="end_date" required></p>
            <br>
            <p><h5>Description </h5></p>
            <p><textarea name="description" cols="70" rows="10" required></textarea></p>
            <input class="submit button1" type="submit" value="Submit">
    </div>
    </form>
    </body>
    </html>
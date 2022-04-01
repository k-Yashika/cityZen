<!--contributions home: use case 5--> 
<?php
  $conn = mysqli_connect("localhost", "root","");
  $db = mysqli_select_db($conn, "cityZen");
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
          #IDs {
            width: 200px;
            margin: 0 auto;
          }
          #IDs tr td {
            border: 1px solid #cccccc;

          }
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
              <a href="record_contributions.php" class="nav-link">
              Record Contributions
              </a>
            </li>

            <li class="nav-item">
              <a href="login.php" class="nav-link">
                Login
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
    <br>
    <div class="w3-container" id="manage-appeal">
      <h2 class="w3-center">Record Contribution</h2>
    </div>

    <div class="dropdown">
      <?php
        $query = "SELECT * FROM `appeals`";
        $result = mysqli_query($conn,$query);
      ?>
      <form name="appealFormdd" action="record_contributions.php" method="post">
        <table id="IDs" style="width:80%">
              <tr>
                  <td>Select</td>
                  <td>ID</td>
                  <td>From Date</td>
                  <td>To Date</td>
              </tr>
          
            <?php
            WHILE($row=mysqli_fetch_array($result)){
              ?>
              <tr>
                <td><input type="radio" name="radID" value="<?php echo $row["ID"]; ?>"/></td>
                <td><?php echo $row["ID"] ?></td>
                <td><?php echo $row["start_date"] ?></td>
                <td><?php echo $row["end_date"] ?></td>
              </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <input class="submit-btn" type="submit" name="btnSubmit" value="Submit" style="margin: 0 auto !important">     
    </body>
    </html>
    

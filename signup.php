<?php
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
  include('server.php');
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
    

    <title>Sign up</title>

    <style>

      body {
        background-image: url('img/');
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: 100% 100%;
      }
      </style>

  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
      <!--to contain contents in the container in the nav bar-->
      <div class="container">
        <!--Put title and image of the website-->
        <a href="#" class="navbar-brand mb-0 h1">
          <img src="img/HelpAid3.png" width="45" height="auto" alt="imageWeb">
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
              <a href="#" class="nav-link">
                Sign Up
              </a>

              
              

            </li>

            <li class="nav-item">
              <a href="login.php" class="nav-link">
                Login
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
  

<br><br><br>
<br>



    <form action="signup.php" method="post" style="border:1px solid #ccc">
    <?php include('errors.php'); ?>
        <div class="container">
      
      <h1>Sign Up</h1>
      <hr>    
          
        
           
        <div class="row">
            <div class="col">
                <label for="username" ><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required value="<?php if(isset($username)){echo $username;} ?>" > 
            </div>
          
        </div>

        <div class="row">
            <div class="col">
                <label for="password_1"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password_1" required  value="<?php if(isset($password_1)){echo $password_1;} ?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="password_2"><b>confirm Password</b></label>
                <input type="password" placeholder="ReEnter Password" name="password_2" required value="<?php if(isset($password_2)){echo $password_2;} ?>">
            </div>
        </div>


          

        <div class="row">
            <div class="col">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required value="<?php if(isset($email)){echo $email;} ?>"> 
            </div>
        </div>
          

        <div class="row">
            <div class="col">
                <label for="passport"><b>Passport / IC</b></label>
                <input type="text" placeholder="Enter your passport number / IC number" name="passport" required value="<?php if(isset($passport)){echo $passport;} ?>" >
            </div>
        </div>
          
      
        <div class="row">
            <div class="col">
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>
            </div>
        </div>
          <label>
            
      
          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      
          <div class="clearfix">
            <button type="submit" class="signupbtn"  name="reg_user" >Sign Up</button>
            
             
            <button type="button" class="cancelbtn">Cancel</button>
            
            
          </div>
        </div>
        <p>
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
      </form>

    <!-- ======= Footer ======= -->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">
          <div class="row text-center">
              <div class="col-sm-6">

                <div class="footer-info">
                  <img src="img/HelpAid3.png" width="45" height="auto" alt="PCVSIcon">
                  <h3>CityZen</h3>
                  <p></p>
                </div>

                <div class="footer-newsletter">
                  
                  <p></p>
                </div>

              </div>
              

             

                <div class="footer-links">
                  <br><br>
                  <h4>Contact Us</h4>
                  <p>
                    <strong>Address : </strong>No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan<br>
                    Bukit Damansara, 50490<br>
                    Kuala Lumpur<br>
                    <strong>Phone : </strong>017-764-5423<br>
                    <strong>Email : </strong>Parnia.sakhaei@gmail.com<br>
                  </p>
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>CTIS</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End  Footer -->  
    

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    
  </body>
</html>
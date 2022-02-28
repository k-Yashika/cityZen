<!DOCTYPE html>
<html>
    <head>
        <title>Manage Organization</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2">
        
        <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
        body, html {
            height: 100%;
            line-height: 1.8;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        .w3-container{
          margin-top: 50px;
          padding: 16px;
        }

        .dropdown{
          text-align: center;
        }
        </style>
    </head>
    <body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
        <a href="#home" class="w3-bar-item w3-button w3-wide">cityZen</a>
        <!-- Right-sided navbar links -->
        <div class="w3-right w3-hide-small">
        <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-user"></i> ABOUT</a>
        <a href="#manage-organization" class="w3-bar-item w3-button"><i class="fa fa-th"></i> MANAGE ORGANIZATION</a>
        <a href="#log-out" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> LOG OUT</a>
        </div>

        <!-- Hide right-floated links on small screens and replace them with a menu icon -->
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
        </a>
    </div>
    </div>

    <!-- Sidebar on small screens when clicking the menu icon -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
        <a href="#manage-organization" onclick="w3_close()" class="w3-bar-item w3-button">MANAGE ORGANIZATION</a>
        <a href="#account" onclick="w3_close()" class="w3-bar-item w3-button">ACCOUNT</a>
        <a href="#log-out" onclick="w3_close()" class="w3-bar-item w3-button">LOG OUT</a>
    </nav>

    <div class="w3-container" id="manage-org">
      <h1 class="w3-center">Manage Organizations</h1>
    </div>

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Select an existing Organization
      </button>
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" onclick="window.location.href='new_org.php'" class="addbtn">
        Add a New Organization
      </button>
    </div>

    <script>
      // Toggle between showing and hiding the sidebar when clicking the menu icon
      var mySidebar = document.getElementById("mySidebar");
      
      function w3_open() {
        if (mySidebar.style.display === 'block') {
          mySidebar.style.display = 'none';
        } else {
          mySidebar.style.display = 'block';
        }
      }
      
      // Close the sidebar with the close button
      function w3_close() {
          mySidebar.style.display = "none";
      }
      </script>
</body>
</html>

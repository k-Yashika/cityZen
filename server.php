<?php
session_start();

// connect to the database
$conn = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($conn, 'cityZen');

$alarms = array();
$errors = array(); 
if(count($_POST) > 0){
  if(isset($_POST['reg_user'])){
    $username = !empty($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password_1 = !empty($_POST['password_1']) ? mysqli_real_escape_string($conn, $_POST['password_1']) : '';
    $password_2 = !empty($_POST['password_2']) ? mysqli_real_escape_string($conn, $_POST['password_2']) : '';
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $passport = !empty($_POST['passport']) ? mysqli_real_escape_string($conn, $_POST['passport']) : '';
  
    if($username == ''){
      $errors['username'] = 'Username can not be empty!';
    }

    if($password_1 == ''){
      $errors['password_1'] = 'Password can not be empty!';
    }

    if($password_2 == ''){
      $errors['password_2'] = 'RePassword can not be empty!';
    }

    if($password_1 != $password_2){
      $errors['equal'] = 'RePassword is not equal Password';
    }

    if($email == ''){
      $errors['email'] = 'Email can not be empty!';
    }
  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email_invalid'] = 'Email is not correct';
    }

    if($passport == ''){
      $errors['passport'] = 'Passport can not be empty!';
    }

    if(count($errors) == 0){
      $query = "INSERT INTO `tb_users` (`username`, `password`, `email`, `passport`) VALUES ('".$username."', '".$password_1."', '".$email."', '".$passport."');";
      $result = mysqli_query($conn, $query);
      //$_SESSION['username'] = $username;
      //$_SESSION['success'] = 1;

      header('Location: login.php');
//      echo '<pre>' . print_r($result, 1)  . '</pre>';
    } else {
      //echo '<pre>' . print_r($errors, 1) . '</pre>';
    }
  }


  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $username = !empty($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = !empty($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
  
    if($username == ''){
      $errors['username'] = 'Username can not be empty!';
    }

    if($password == ''){
      $errors['password'] = 'Password can not be empty!';
    }
  
    if (count($errors) == 0) {
        $password = $password;
        $query = "SELECT * FROM `tb_users` WHERE `username`='$username' AND `password` ='$password'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = 1;

          header('location: index.php');
        } else {
          $errors['password'] = 'Username or Password is not correct!';
        }
    }
  }
}



  ?>

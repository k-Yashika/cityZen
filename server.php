<?php
session_start();

// connect to the database
$conn = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($conn, 'cityZen');

$alarms = array();
$errors = array(); 
if(count($_POST) > 0){
  if(isset($_POST['reg_user'])){
    $fullname = !empty($_POST['fullname']) ? mysqli_real_escape_string($conn, $_POST['fullname']) : '';
    $applicantID = !empty($_POST['applicantID']) ? mysqli_real_escape_string($conn, $_POST['applicantID']) : '';
    $address = !empty($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $householdIncome = !empty($_POST['householdIncome']) ? mysqli_real_escape_string($conn, $_POST['householdIncome']) : '';
  
    if($fullname == ''){
      $errors['fullname'] = 'FullName can not be empty!';
    }

    if($applicantID == ''){
      $errors['applicantID'] = 'Applicant ID can not be empty!';
    }

    if($address == ''){
      $errors['address'] = 'Address can not be empty!';
    }

    if($householdIncome == ''){
      $errors['householdIncome'] = 'householdIncome can not be empty!';
    }

    if(count($errors) == 0){
      $query = "INSERT INTO `tb_users` (`fullname`, `applicantID`, `address`, `householdIncome`) VALUES ('".$fullname."', '".$applicantID."', '".$address."', '".$householdIncome."');";
      $result = mysqli_query($conn, $query);

      header('Location: signup.php?register=done');
//      echo '<pre>' . print_r($result, 1)  . '</pre>';
    } else {
      echo 'Failed';
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
        $query = "SELECT * FROM `representatives` WHERE `username`='$username' AND `password` ='$password'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = 1;

          header('location: signup.php');
        } else {
          $errors['password'] = 'Username or Password is not correct!';
        }
    }
  }
}



  ?>

<?php

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function SendMail($email, $subject, $body){
    
    //$body = 'this is a test for you.';
    //$email = 'mehrdadsalahi@ymail.com';

    require(__DIR__."/PHPMailer/PHPMailer.php");
    require(__DIR__."/PHPMailer/SMTP.php");
    require(__DIR__."/PHPMailer/Exception.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->isSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    
    $mail->Username = 'ctznprjct@gmail.com';
    $mail->Password = '_123456**';
    $mail->IsHTML(true);
    $mail->AddAddress($email, "Receiver Name");
    $mail->SetFrom("ctznprjct@gmail.com", "From Name");

    $mail->Subject = $subject;
    //$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";

    $mail->MsgHTML($body);
    if (!$mail->Send()) {
        echo "Error while sending Email.";
    } else {
        echo "Email sent successfully";
    }

}


  ini_set('display_errors', '1');
  error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "root","");
$db = mysqli_select_db($conn, "cityZen");
$errors = array();

if($conn == false){
    die("ERROR: Could not connect" . mysqli_connect_error());
}

$username = !empty($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
$fullname = !empty($_POST['fullname']) ? mysqli_real_escape_string($conn, $_POST['fullname']) : '';
$email    = !empty($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
$mobileno = !empty($_POST['mobileno']) ? mysqli_real_escape_string($conn, $_POST['mobileno']) : '';
$jobtitle = !empty($_POST['jobtitle']) ? mysqli_real_escape_string($conn, $_POST['jobtitle']) : '';

if($username == ''){
    $errors['username'] = 'Username is empty!';
}

if($fullname == ''){
    $errors['fullname'] = 'FullName is empty!';
}

if($email == ''){
    $errors['email'] = 'Email is empty!';
}
  
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_invalid'] = 'Email is not correct';
  }

if($mobileno == ''){
    $errors['mobileno'] = 'Mobile Number is empty!';
}

if($jobtitle == ''){
    $errors['jobtitle'] = 'Job Title is empty!';
}

if(count($errors) == 0){

    $password = randomPassword();
    $vkey = "username=$username&password=$password";
    $link = $_SERVER['SERVER_ADDR'].'/registration/login.php';

    $subject = "Email project";
    $body = "UserName : $username\nPassword : $password\n\nLink : $link";

    $sql = "INSERT INTO `representatives` (`username`, `password`, `fullname`, `email`, `mobileno`, `jobtitle`) VALUES ('$username', '$password', '$fullname', '$email', '$mobileno', '$jobtitle')";

    if(mysqli_query($conn, $sql)){
        echo "data stored successfully";
        SendMail($email, $subject, $body);
    } else{
        echo "ERROR: $sql. " . mysqli_error($conn);
    }

    //mysqli_close($conn);
    //header("location: new_rep.php");
    
}
else {
    echo '<pre>' . print_r($errors, 1) . '</pre>';
}

?>
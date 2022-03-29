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
            $Errors['error_date'] = 'Start Date must be sooner than End Date';
        }
    
        if(count($Errors) > 0){
            echo '<pre>' . print_r($Errors, 1) . '</pre>';
            die();
        } else {
            $queryInsert = "INSERT INTO appeals (`start_date`, `end_date`, `description`) VALUES ('$start_date', '$end_date', '$description')";
    
            if(mysqli_query($conn, $queryInsert)){
                echo "Success";
                header("location: new_appeal.php");
            } else{
                echo $db->error;
            }
            mysqli_close($db);
        }
    }
?>

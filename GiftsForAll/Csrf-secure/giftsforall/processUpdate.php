<?php
session_start();
$mysqli = require __DIR__ . '/config/db1.php';

function validateCSRFToken($token) {
    if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token) {
        unset($_SESSION['csrf_token']); 
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['csrf_token'])){
    if (!validateCSRFToken($_POST['csrf_token'])) {
        die("cannot be  CSRF attack");
       }
    }else{
        die("can be  CSRF attack");       
    }
          $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE users SET user_password = '$password' WHERE user_ID = '$user_id'";
    $result = $mysqli->query($sql);

    if ($result) { 
        header('Location: account.php');
    } else {
        echo 'Failed to update password.';
    }

}
?>

<?php
session_start();
$mysqli = require __DIR__ . '/config/db1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

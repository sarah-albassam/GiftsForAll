<?php   session_start();
include("assets/header.php"); 
require('config/db.php');

// Define a function to sanitize input values
function sanitizeInput($value) {
  $value = trim($value); // Remove whitespace from the beginning and end of the input string
  $value = stripslashes($value); // Remove backslashes
  $value = htmlspecialchars($value); // Convert special characters to HTML entities
  return $value;
}

// Define a function to validate the form data

function InputValidation(){
  // Validate full name input
if (!preg_match("/^[a-zA-Z]{3,20}(?: ?[a-zA-Z]{0,20}){0,2}$/", trim($_POST["full_name"]))) {
  echo '<div class="alert alert-danger" role="alert">Invalid full name. Full name should contain only letters and 0 or more spaces, with  a length between 3 and 20 characters.</div>';

  }

// Validatemobile number input
if (!preg_match("/^[0-9]{10}$/", trim($_POST["mobile_number"]))) {
  echo '<div class="alert alert-danger" role="alert">Invalid mobile number. Please enter a 10-digit phone number.</div>';}

  // Validate  email input
if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
  echo '<div class="alert alert-danger" role="alert"> "Invalid email format !"</div>';
;}

  // Validate password input
if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,10}$/",trim($_POST["password"])) ) {
  echo '<div class="alert alert-danger" role="alert"> Invalid password format. Password must be 8-10 characters long and include at least one lowercase letter, one uppercase letter, and one number.</div>';}

}


/*
  session_set_cookie_params([
      'lifetime' => 0,
      'path' => '/',
      'domain' => '',
      'secure' => true,
      'httponly' => true,
      'samesite' => 'Lax'
  ]);



if (isset($_COOKIE['my_cookie'])) {
  $params = session_get_cookie_params();
  $samesite = $params['samesite'];
  if ($samesite !== 'Lax') {
      // Handle the error as needed
      die("Something went wrong, please try again.");
  }
}*/

// if (!isset($_POST['csrf_token'])){
//   echo '<div class="alert alert-danger" role="alert"><strong>   Something  went  wrong,  Please try  again!</strong></div>';
//   die("");
// }
// else if($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//   // CSRF token is invalid, do not process the form
//   echo '<div class="alert alert-danger" role="alert">Invalid operation detected. Please try again!</div>';
//    die("");
// }
  
//  else {
//   // process the form normally

// if (empty($_POST['full_name']) || empty($_POST['mobile_number']) || empty(($_POST['email'])) ||empty($_POST['password']) || empty($_POST['confirm_password'])){
//   echo '<div class="alert alert-danger" role="alert">Invalid registration, Fill the form and try again!</div>';
//   die("");

// }
//  validate form input data 
  InputValidation();

// Sanitize the form input values and bind them to the prepared statement parameters

$full_name = sanitizeInput($_POST['full_name']);
$mobile_number = sanitizeInput($_POST['mobile_number']);
$email = sanitizeInput($_POST['email']);
$password = password_hash(sanitizeInput($_POST['password']), PASSWORD_DEFAULT); // Hash the password for security


// Prepare a statement for inserting data into the database
$stmt = mysqli_prepare($conn, "INSERT INTO users (full_name, phoneNum, email, user_password) VALUES (?, ?, ?, ?)");


// Sanitize the form input values and bind them to the prepared statement parameters
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash(mysqli_real_escape_string($conn, $_POST['password']), PASSWORD_DEFAULT); // Hash the password for security
mysqli_stmt_bind_param($stmt, 'ssss', $full_name, $mobile_number, $email, $password);

// Check if the email already exists in the database
$sql = "SELECT * FROM users WHERE email = ?";
$stmt_check_email = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt_check_email, 's', $email);
mysqli_stmt_execute($stmt_check_email);
$result = mysqli_stmt_get_result($stmt_check_email);

if (mysqli_num_rows($result) > 0) {
  // Display an error message if the email already exists
  echo '<div class="alert alert-danger" role="alert">This email is already in use. Please enter a different email. <a target="_blank" href="signup.php"><strong>Try Again<strong></a></div><br><br><br><br><br><br><br><br>';
} 
else {
  
  if (mysqli_stmt_execute($stmt)) {
          // Data inserted successfully
         // header("location: index.php");
         $lastInsertId = mysqli_insert_id($conn);
         $_SESSION["user_id"]=$lastInsertId;
    echo '<script>window.location.href = "index.php";</script>';

      } else {
          // Something went wrong
          echo '<div class="alert alert-danger" role="alert">Failed registration, please try again. '. mysqli_stmt_error($stmt).'</div>';      }
  }
  
// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_check_email);



// Close the database connection
mysqli_close($conn);




include("assets/footer.php"); 





?>
<?php
// updateInfo.php
session_start();

// Check if the form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $fullName = $_POST['fullName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $cn = $_POST['cn'];
    $exd = $_POST['exd'];
    $cvv = $_POST['cvv'];

    // Validate and sanitize the form data (you can add more validation if needed)
    $fullName = htmlspecialchars(trim($fullName));
    $mobile = htmlspecialchars(trim($mobile));
    $email = htmlspecialchars(trim($email));
    $addr = htmlspecialchars(trim($addr));
    $cn = htmlspecialchars(trim($cn));
    $exd = htmlspecialchars(trim($exd));
    $cvv = htmlspecialchars(trim($cvv));

    // Update the information in the database using the retrieved values
    // Perform your database update operation here
    $mysqli = require __DIR__ . '/config/db1.php';

    // Prepare the UPDATE query
    $sql = "UPDATE users SET full_name = ?, phoneNum = ?, email = ?, card_num = ?, card_expDate = ?, card_CVV = ?, address = ? WHERE user_ID = ?";
    $stmt = $mysqli->prepare($sql);

    // Bind the parameters to the prepared statement
    $stmt->bind_param("sssssssi", $fullName, $mobile, $email, $cn, $exd, $cvv, $addr, $_SESSION["user_id"]);

    // Execute the prepared statement
    $updateResult = $stmt->execute();

    // Check if the update was successful
    if ($updateResult) {
        // Return a success message back to the JavaScript code
        echo "Information updated successfully!";
    } else {
        // Return an error message back to the JavaScript code
        echo "Error updating information. Please try again.";
    }

    // Close the statement and database connection
    $stmt->close();
    $mysqli->close();
} else {
    // Handle the case when the form is not submitted
    // You can return an error message or redirect to an appropriate page
    echo "Invalid request. Please submit the form.";
}
?>

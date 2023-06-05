<?php
session_start();
include("assets/header.php");
?>

<?php
// fetch data from DB
$mysqli = require __DIR__ . '/config/db1.php';

$sql = "SELECT * FROM users WHERE user_ID = '".$_SESSION["user_id"]."'";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $u_id = $user["user_ID"];
    $u_email = $user["email"];
    $u_name = $user["full_name"];
    $u_mobile = $user["phoneNum"];
    $u_CN = $user["card_num"];
    $u_expD = $user["card_expDate"];
    $u_cvv = $user["card_CVV"];
    $u_addr = $user["address"];
}




?>


     <!--  ************************* Page Title Starts Here ************************** -->
     <div class="page-nav no-margin row">
            <div class="container">
                <div class="row">
                    <h2 class="text-start">Account</h2>
                    
                </div>
            </div>
        </div>
        
        
    <!--####################### Account Starts Here ###################-->
    <div class="container-fluid big-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 py-5 mx-auto">
                    <div class="login-card bg-white shadow-md p-5">
                        
                        <h4 class="text-center mb-5">Account Information</h4>
                        <form id="form" >
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">                                    
                                
                                <label for="">Full Name</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id="fullName" type="text" placeholder="Enter Full Name" value="<?= htmlspecialchars($u_name) ?>" class="form-control" readonly>
                            </div></fieldset>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">
                                <label for="">Mobile number</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id="mobile" type="text" placeholder="Enter Mobile Number" value="<?= htmlspecialchars($u_mobile) ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">
                                <label for="">Email Address</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id="email" type="text" placeholder="Enter Email Address" value="<?= htmlspecialchars($u_email) ?>" class="form-control" readonly>
                            </div>
                        </div>
                         <div class="form-row row">
                           <a id="passButton" href="changepassword.php" class="btn btn-danger float-end fw-bolder px-4" align="center">Change Password</a><br>
                            <h4 class="text-center mb-5">Address Information</h4><br><br>
                            <div class="col-md-4 pt-2">
                                <label for="">Address </label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id= "addr" type="text" placeholder="Enter your Address" value="<?= htmlspecialchars($u_addr) ?>" class="form-control" readonly>
                            </div>
                            <h4 class="text-center mb-5">Card Information</h4>
                            <div class="col-md-4 pt-2">
                                <label for="">Card Number</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id="cn" type="text" placeholder="Enter Card Number" value="<?= htmlspecialchars($u_CN) ?>" class="form-control" readonly>
                            </div>
                            
                            <div class="col-md-4 pt-2">
                                <label for="">Date of expiration </label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input id="exd" type="text" placeholder="Enter Date of Expiration" value=" <?= htmlspecialchars($u_expD) ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-4 pt-2">
                                <label for="">CVV </label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input  id="cvv" type="text" placeholder="Enter CVV" value="<?= htmlspecialchars($u_cvv) ?>" class="form-control" readonly>
                            </div>
                            </div>
                           
                              <div class="col-7 right ">
                                 <br><br>
                              <button  id="saveButton" hidden onclick="save()" class="btn btn-danger float-end fw-bolder px-4" align="center">Save</button>
                              <button id="editButton" onclick="change(event)" class="btn btn-danger float-end fw-bolder px-4" align="center">Edit</button><br><br>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
       
    
    <script>
     function  change(event){
        event.preventDefault();
        document.getElementById('editButton').hidden = true;
        document.getElementById('saveButton').hidden = false;

        document.getElementById('fullName').readOnly = false;
        document.getElementById('mobile').readOnly = false;
        document.getElementById('email').readOnly = false;
        document.getElementById('addr').readOnly = false;
        document.getElementById('cn').readOnly = false;
        document.getElementById('exd').readOnly = false;
        document.getElementById('cvv').readOnly = false;


    };
    function save(){
        document.getElementById('fullName').readOnly = true;
        document.getElementById('mobile').readOnly = true;                
        document.getElementById('email').readOnly = true;
        document.getElementById('addr').readOnly = true;
        document.getElementById('cn').readOnly = true;
        document.getElementById('exd').readOnly = true;
        document.getElementById('cvv').readOnly = true;

            // Get the updated values from the input fields
        var fullName = document.getElementById('fullName').value;
        var mobile = document.getElementById('mobile').value;
        var email = document.getElementById('email').value;
        var addr = document.getElementById('addr').value;
        var cn = document.getElementById('cn').value;
        var exd = document.getElementById('exd').value;
        var cvv = document.getElementById('cvv').value;

        // Sanitize the values
        fullName = sanitizeString(fullName);
        mobile = sanitizeString(mobile);
        email = sanitizeString(email);
        addr = sanitizeString(addr);
        cn = sanitizeString(cn);
        exd = sanitizeString(exd);
        cvv = sanitizeString(cvv);

        // Use AJAX to submit the form data to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateInfo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send('fullName=' + fullName + '&mobile=' + mobile + '&email=' + email + '&addr=' + addr + '&cn=' + cn + '&exd=' + exd + '&cvv=' + cvv);
}
    
   
    function updatePassword(event) {
        event.preventDefault();
        document.getElementById('changepass').hidden = true;
        document.getElementById('submitchange').hidden = false;
        document.getElementById('labelP').hidden = false;
        document.getElementById('spP').hidden = false;
        document.getElementById('pass').hidden = false;
    

    // Add an event listener to the form submission
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var password = document.getElementById('pass').value;

        if (!validatePassword(password)) {
        alert("Password must be at least 8 characters long and contain at least one letter and one number.");
        return;
    }


        // Use AJAX to submit the form data to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'processUpdate.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                document.getElementById('changepass').hidden = false; // Show the "Change Password" button again
                document.getElementById('submitchange').hidden = true; // Hide the "Save Changes" button
                document.getElementById('labelP').hidden = true; // Hide the "Password" label
                document.getElementById('spP').hidden = true; // Hide the ":" span for the password label
                document.getElementById('pass').hidden = true; // Hide the password input field
                document.getElementById('pass').value = ""; // Clear the password field
                
            }
        };
        xhr.send('password=' + password);

    });
    function validatePassword(password) {
    var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    return pattern.test(password);
    }}

    document.getElementById('form').addEventListener('submit', submitChange);

    // Helper function to sanitize the input string
    function sanitizeString(input) {
    // Replace special characters that might cause issues in the query
    var sanitized = input.replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
    return sanitized;
    }   
    function invalidPassword() {
  let passwordField = document.getElementById("password");
  let message = document.getElementById("password-message");
  passwordField.setCustomValidity("");
  if (!passwordField.validity.valid) {
    message.innerHTML = "Password must be 8-10 characters long and include at least one lowercase letter, one uppercase letter, and one number.";
    message.style.display = "block";
  }}

</script>


<?php include("assets/footer.php") ?>
      
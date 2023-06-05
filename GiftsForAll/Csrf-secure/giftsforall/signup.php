<?php 

// Include the header file
include("assets/header.php"); 


?>
<html>
<head>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <!-- Your other head elements -->
</head>         
<body>       
     <!--  ************************* Page Title Starts Here ************************** -->
     <div class="page-nav no-margin row">
            <div class="container">
                <div class="row">
                    <h2 class="text-start">Sign Up Page</h2>
                    <ul>
                        <li> <a href="#"><i class="bi bi-house-door"></i> Home</a></li>
                        <li><i class="bi bi-chevron-double-right pe-2"></i>Sign Up</li>
                    </ul>
                </div>
            </div>
        </div>
        
        
    <!--####################### About US Starts Here ###################-->
    <div class="container-fluid big-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-10 py-5 mx-auto">
                <div class="login-card bg-white shadow-md p-5">
                    <h4 class="text-center mb-5">Enter your detail to Signup</h4>
                    <form method="POST" action="signuprocess.php" id="signup-form">
    <div class="form-row row">
        <div class="col-md-4 pt-2">
            <label for="full_name">Full Name</label>
            <span class="fw-bolder float-end"></span>
        </div>
        <div class="col-md-8">
            <input type="text" id="full_name" name="full_name" placeholder="Enter Full Name" class="form-control" required pattern="^[a-zA-Z]{3,20}(?: ?[a-zA-Z]{0,20}){0,2}$" title="Enter a name of 3 to 20 letters">

        </div>
    </div>
    <div class="form-row row">
        <div class="col-md-4 pt-2">
            <label for="mobile_number">Mobile number</label>
            <span class="fw-bolder float-end"></span>
        </div>
        <div class="col-md-8">
            <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter MobileNumber" class="form-control" pattern="[0-9]{10}" title="Enter a phone number of 10 digits"required>
            <span id="mobile-error-message" class="text-danger"></span>
        </div>
    </div>
    <div class="form-row row">
        <div class="col-md-4 pt-2">
            <label for="email">Email Address</label>
            <span class="fw-bolder float-end"></span>
        </div>
        <div class="col-md-8">
            <input type="email" id="email" name="email" placeholder="Enter Email Address" class="form-control" pattren="/^[^\s@]+@[^\s@]+\.[^\s@]+$/" title="Enter email in the format ***@***.***"required>
            <span id="email-error-message" class="text-danger"></span>
        </div>
    </div>
    <div class="form-row row">
        <div class="col-md-4 pt-2">
            <label for="password">Password</label>
            <span class="fw-bolder float-end"></span>
        </div>
        <div class="col-md-8">
            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
        </div>
    </div>
    <div class="form-row row">
        <div class="col-md-4 pt-2">
            <label for="confirm_password">Confirm Password</label>
            <span class="fw-bolder float-end"></span>
        </div>
        <div class="col-md-8">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Password" class="form-control" required >
            <span id="password-error-message" class="text-danger"></span>
        </div>
        
        <input type="hidden" name="csrf_token" id = "csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div  id="password-message" style="display: none; color: red;"></div>
        <div style="height: 10px;"></div>
    </div>
    <div class="form-row row">
        <div class="col-md-4 pt-2">
        </div>
        <div class="col-md-8">
            <button type="submit" class="btn btn-danger">Signup</button>
        </div>
        <div id="signup-errors" class="text-danger"></div>

    </div>
</form>

<script>

const form = document.getElementById('signup-form');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm_password');
const passwordError = document.getElementById('password-error-message');


// Validate the password and confirm password inputs
function validatePassword() {
const message = document.getElementById('password-message');
passwordInput.setCustomValidity('');
console.log(passwordInput.validity.valid);

  const password = passwordInput.value;

  if (password.length < 8 || password.length > 10) {
    message.innerHTML = 'Password must be 8-10 characters long and include at least one lowercase letter, one uppercase letter, and one number.';
    message.style.display = 'block';
    return false;
  } else if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
    message.innerHTML = 'Password must include at least one lowercase letter, one uppercase letter, and one number.';
    message.style.display = 'block';
    return false;
  } else {
    // Password meets all criteria
    // Add your code for successful validation here
  }





  if (passwordInput.value !== confirmPasswordInput.value) {
    message.innerHTML = 'Passwords do not match.';
    return false;
  }  else {
    message.innerHTML = '';
  return true;
  }
}


// Add an event listener to the form's submit button
form.addEventListener('submit', function(event) {
  // Prevent the form from submitting automatically
  event.preventDefault();


  const isPasswordValid = validatePassword();

  // Submit the form if all input is valid
  if ( isPasswordValid) {
    form.submit();
  }
});
  

</script>
                </div>
            </div>
         </div>
     </div>
     </div>




<?php
    include('config/db.php');

    include("assets/footer.php") ?>
        

<?php
session_start();
include("assets/header.php");

function generateCSRFToken() {
    $token = bin2hex(random_bytes(32)); // Generate a random token
    $_SESSION['csrf_token'] = $token; // Store it in the session
    return $token;
}

$csrfToken = generateCSRFToken();
?>




     <!--  ************************* Page Title Starts Here ************************** -->
     <div class="page-nav no-margin row">
            <div class="container">
                <div class="row">
                    <h2 class="text-start">Change Password</h2>
                    
                </div>
            </div>
        </div>
        
        
    <!--####################### Account Starts Here ###################-->
    <div class="container-fluid big-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 py-5 mx-auto">
                    <div class="login-card bg-white shadow-md p-5">
                        
                        <form action="http://localhost/demo/processUpdate.php" id="pwform" method="POST" >
                         <div class="form-row row">
                         <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

                            <div class="col-md-4 pt-2">
                                <label id="labelP"  >New Password</label>
                                <span id="spP"  class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input type="password" id="password" name="pass"  type="text" placeholder="Enter Password" 
                                class="form-control">
                            </div>
                            <div  id="password-message" style="display: none; color: red;"></div>

                            <button id="submitchange"   class="btn btn-danger float-end fw-bolder px-4" >Save changes</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
       
    
    <script>
const passwordInput = document.getElementById('password');

    document.getElementById('submitchange').addEventListener('click', function(event) {
        //prevent default submit
        event.preventDefault();
        const isPasswordValid = validatePassword();
console.log(isPasswordValid)
// Submit the form if all input is valid
if ( isPasswordValid) {
    document.getElementById('pwform').submit();
}
    })
  // Validate 
function validatePassword() {
const message = document.getElementById('password-message');
passwordInput.setCustomValidity('');

  const password = passwordInput.value;

  if (password.length < 8 || password.length > 10) {
    message.innerHTML = 'Password must be 8-10 characters long and include at least one lowercase letter, one uppercase letter, and one number.';
    message.style.display = 'block';
    return false;
  } else if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
    message.innerHTML = 'Password must include at least one lowercase letter, one uppercase letter, and one number.';
    message.style.display = 'block';
    return false;
  }
return true;

}  
</script>


<?php include("assets/footer.php") ?>
        
        
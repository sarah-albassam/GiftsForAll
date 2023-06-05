<?php
session_start();
include("assets/header.php");
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
                        
                        <form action="http://localhost/giftsforall/processUpdate.php" method="POST" >
                         <div class="form-row row">
                            <div class="col-md-4 pt-2">
                                <label id="labelP"  >New Password</label>
                                <span id="spP"  class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="pass"  type="text" placeholder="Enter Password" 
                                class="form-control" title="8-10 long with atleast one lowercase letter, uppercase letter and digit" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,10}$"   oninvalid="invalidPassword()">
                            </div>
                            <button id="submitchange"   class="btn btn-danger float-end fw-bolder px-4" align="center">Save changes</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
       
    
    <script>
    
</script>


<?php include("assets/footer.php") ?>

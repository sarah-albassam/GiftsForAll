<?php 
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli = require __DIR__ . '/config/db1.php';

    $email = $mysqli->real_escape_string($_POST['email']);
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = $mysqli->query($sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($_POST["password"], $user["user_password"])) {
            session_start();
            $_SESSION["user_id"] = $user["user_ID"];
            $_SESSION["user_name"] = $user["full_name"];
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid email or password. Please try again.";
        }
    } else {
        $error = "Invalid email or password. Please try again.";
    }
}

// Check if an error message is present in the URL
if (isset($_GET['error'])) {
    $error = '';
    $errorCode = $_GET['error'];

    switch ($errorCode) {
        case 'invalid_credentials':
            $error = 'Invalid email or password. Please try again.';
            break;
        default:
            $error = 'An error occurred. Please try again.';
            break;
    }
}
?>
<?php include("assets/header.php")?>
        
<!--  ************************* Page Title Starts Here ************************** -->
<div class="page-nav no-margin row">
    <div class="container">
        <div class="row">
            <h2 class="text-start">Login Page</h2>
            <ul>
                <li> <a href="#"><i class="bi bi-house-door"></i> Home</a></li>
                <li><i class="bi bi-chevron-double-right pe-2"></i> User Login</li>
            </ul>
        </div>
    </div>
</div>

<!--####################### Login Starts Here ###################-->
<div class="container-fluid big-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-10 py-5 mx-auto">
                <div class="login-card bg-white shadow-md p-5">
                    <h4 class="text-center mb-5">Enter your detail to Login</h4>

                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>

                    <!--####################### Form Starts Here ###################-->
                    <form method="POST">
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">
                                <label for="">Email Address</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input name="email" type="text" placeholder="Enter Email Address" class="form-control"
                                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">
                                <label for="">Password</label>
                                <span class="fw-bolder float-end">:</span>
                            </div>
                            <div class="col-md-8">
                                <input name="password" type="password" placeholder="Enter Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-4 pt-2">

                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-danger">Click to Login</button>
                                <a href=""><span class="float-end pt-2">forget Password ?</span></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("assets/footer.php") ?>

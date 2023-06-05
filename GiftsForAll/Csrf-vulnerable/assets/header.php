<!doctype html>

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Gifts For All</title>
        <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/fav.jpg">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    </head>
    <body>
      
        <header class="container-fluid bg-white">
                  <div class="header-top bg-gray  border-bottom">
                <div class="container">
                    <div class="row">
                      <div class="col-md-8"></div>
                  <?php if (isset($_SESSION["user_id"])):  ?>
                        <div class="col-md-4 d-flex align-items-end">
                            <ul class="ms-auto d-inline-flex">
                                <li class="p-2"><a target="_blank" href="logout.php"><button class="btn px-4 btn-danger">Login out</button></a></li>
                                <li class="p-2"><a target="_blank" href="account.php"><button class="btn px-4 btn-danger">Account</button></a></li>

                            </ul>
                        </div>
                    
                    </div>
                </div>
                    <?php else: ?>
                     <div class="col-md-4 d-flex align-items-end">
                            <ul class="ms-auto d-inline-flex">
                                <li class="p-2"><a target="_blank" href="login.php"><button class="btn px-4 btn-danger">Login</button></a></li>
                                <li class="p-2"><a target="_blank" href="signup.php"><button class="btn px-4 btn-outline-danger">Sign Up</button></a></li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <div class="logo-contaienr p-2">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-3 col-9 pt-1 pb-2">
                            <a target="_blank" href="index.php">
                                <img class="logo" src="assets/images/logo2.png" alt="">
                            </a>
                         </div>
                     
                         <div class="col-md-8 col-6 pt-1 text-end">

                           <?php if (isset($_SESSION["user_id"])):  ?>
                            <a target="_blank" href="cart.php">
                                 <button type="button" class="btn btn-light shadow-md border position-relative">
                                  <i class="bi fs-4 bi-basket"></i>
                                  <span class="position-absolute fs-6 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  

                                  </span>
                                </button>
                             </a>
                             <?php else: ?>
                                <a target="_blank" href="login.php">
                                 <button type="button" class="btn btn-light shadow-md border position-relative">
                                  <i class="bi fs-4 bi-basket"></i>
                                  <span class="position-absolute fs-6 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                  

                                  </span>
                                </button>
                             </a>
                             <?php endif; ?>
                         </div>
                      </div>
                 </div>   
            </div>
            <div  class="menu-bar bg-danger container-fluid border-top">
                <div class="container">
                   <h6 class="d-md-none text-white p-3 mb-0 fw-bold">Menu 
                  <a  class="text-white" data-bs-target="#menu" data-bs-toggle="collapse" aria-expanded="false" aria-controls="menu"><i class="bi cp bi-list float-end fs-1 dmji"></i></a> 
                   </h6>
                    <ul id="menu" class=" navcol fw-bold d-none d-md-inline-flex">
						<li class="p-21 px-4"><a class="text-white" href="index.php" data-function="home">Home</a></li>
                        <li class="p-21 px-4"><a class="text-white" href="flowers.php" data-function="flowers">Flowers</a></li>
                        <li class="p-21 px-4"><a class="text-white" href="chocolates.php" data-function="chocolates">Chocolates and cookies</a></li>
                        <li class="p-21 px-4"><a class="text-white" href="home.php" data-function="home">Home and living</a></li>
                        <li class="p-21 px-4"><a class="text-white" href="kids.php" data-function="kids">Kids</a></li>
                    </ul>
                </div>
            </div>
        </header>

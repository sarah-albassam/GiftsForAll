<?php 
session_start();
include("assets/header.php");
require_once ("config/db.php");?>

        <div class="slider">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/images/slider/s1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="assets/images/slider/s2.jpg" class="d-block w-100" alt="...">
                </div>
               
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
        </div>
        
        <div class="latest-products pt-5 pb-0">
            <div class="container-xl">
                <div class="section-tile row">
                   <div class="col-md-10 text-center mx-auto">
                       <h5><center>" There is nothing more beautiful than someone who goes out of their way to make life beautiful for others "</center></h5>    
                       <br>
                       <h2>Featured Products</h2>
                       
                   </div>
                </div>
                <div class="row mt-5">
         
                                         <?php 
                            $query = "select * from products " ;
                            $result = mysqli_query($conn ,$query );

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                         echo '<div class="col-lg-3 col-md-4 mb-4">';
                                            echo '<div class="bg-white p-2 shadow-md">';
                                            echo '<div class="text-center">'; 
                                                   echo '<a "detail.php">'; 
                                                    echo '<img src="'.$row['Product_Image'].'"';
                                                       
                                                  echo '</a>';
                                              echo '</div>';
                                               echo '<div class="detail p-2">';
                                                   echo '<h4 class="mimageb-1 fs-5 fw-bold">'.$row["Product_Name"].'</h4>';
                                                   echo '<b class="fs-4 text-danger">'.$row['Product_Price'].'</b>';
                                                   echo '<div class="row pt-2">';
                                                       echo '<div class="col-md-6">';
                                                       echo '</div>';
                                                     echo '<div class="col-md-6">';
                                                     echo '</div>';
                                                   echo '</div>';
                                               echo '</div>';
                                           echo '</div>';
                                       echo '</div>';
                                }
                            } else {
                                echo "No results found";
                            } ?>
                </div>
            </div>
        </div>
        
   
      
<?php include("assets/footer.php") ?>
        
        
    
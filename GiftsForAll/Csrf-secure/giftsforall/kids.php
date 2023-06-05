<?php 
session_start();
include("assets/header.php");
require_once ("config/db.php");?>

     <div class="page-nav p-3 mb-0 no-margin row">
            <div class="container">
                <div class="row">
                    <ul>
                        <li><a href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
                        <li><i class="bi bi-chevron-double-right pe-2"></i>Kids</li>
                    </ul>
                </div>
            </div>
        </div>
        
        
        <div class="container-fluid  py-5 product-cover">
            <div class="container-xl">
                <div class="row">
                   <div class="col-md-2"> 
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <?php 
                            $query = "select * from products WHERE Product_Category='K'" ;
                            $result = mysqli_query($conn ,$query );

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                         echo '<div class="col-lg-4 col-sm-6 mb-4">';
                                            echo '<div class="bg-white p-2 shadow-md">';
                                            echo '<div class="text-center">'; 
                                                   echo '<a href="detail.php">'; 
                                                    echo '<img src="'.$row['Product_Image'].'"';
                                                       
                                                  echo '</a>';
                                              echo '</div>';
                                               echo '<div class="detail p-2">';
                                                   echo '<h4 class="mimageb-1 fs-5 fw-bold">'.$row["Product_Name"].'</h4>';
                                                   echo '<b class="fs-4 text-danger">'.$row['Product_Price'].'</b>';
                                                   echo '<div class="row pt-2">';
                                                       echo '<div class="col-md-6">'; ?>
                                                              <a href="detail.php?id=<?php echo $row["Product_ID"];  ?>" ;
                                                            <?php echo '<button class="btn mb-2 fw-bold w-100 btn-danger ">Details</button>';
                                                           echo '</a>';
                                                       echo '</div>';
                                                     echo '<div class="col-md-6">';
                                                       echo '<a href="cart.php">';
                                                       echo '<button class="btn fw-bold w-100 btn-outline-danger addToCart" data-price='.$row['Product_Price'].' data-name='.$row['Product_Name'].' data-image='.$row['Product_Image'].' data-id='.$row['Product_ID'].'>Add to Cart</button>';
                                                       echo '</a>';  
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
                    </div>
                </div>
        
<?php include("assets/footer.php") ?>
        
              
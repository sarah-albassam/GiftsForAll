<?php 
session_start();
include("assets/header.php") ;
require_once ("config/db.php");

$ID= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
if ($ID !== null)
{
$query = "select * from products WHERE Product_ID= $ID " ;
$result = mysqli_query($conn ,$query );
}

?>
     <div class="page-nav no-margin row">
            <div class="container">
                <div class="row">
                    <ul>
                        <li> <a href="index.php"><i class="bi bi-house-door"></i> Home</a></li>
                          <li><i class="bi bi-chevron-double-right pe-2"></i> Products</li>
                        <li><i class="bi bi-chevron-double-right pe-2"></i>Product details</li>
                    </ul>
                </div>
            </div>
        </div>
        
        
    <!--####################### Product Detail Starts Here ###################-->
    <div class="container-fluid big-padding bg-white about-cover">
  <div class="container">
    <div class="row about-row" style="display: flex; flex-direction: row-reverse; align-items: center;">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-md-5 product-details" style="justify-content: space-between;">';
          echo '<h2>'.$row["Product_Name"].'</h2>';
          echo '<p>'.$row["Product_Details"].'</p>'; 
          echo '<b class="fs-3 py-4 text-danger">'.$row["Product_Price"].'</b><br><br>';
          echo '<a href="cart.php">';
          echo '<button class="btn fw-bold w-100 btn-outline-danger addToCart" data-price='.$row['Product_Price'].' data-name='.$row['Product_Name'].' data-image='.$row['Product_Image'].' data-id='.$row['Product_ID'].'>Add to Cart</button>';
          echo '</a>';  
          echo '</div>';
          echo '<div class="col-md-5 text-center">';
          echo '<img src="'.$row['Product_Image'].'"<br><br>'; 
          echo '</div>';
        
        }
      }
      ?>
    </div>
  </div>
</div>
        
   
        
<?php include("assets/footer.php") ?>



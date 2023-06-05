<?php 
session_start();

include("assets/header.php"); 
require_once ("config/db.php");?>


        
    <!--####################### Cart Starts Here ###################-->
    <div class="container-fluid big-padding about-cover">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <table class="table bg-white shadow-md">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            
                            <th>Price</th>
                           
                            <th>Action</th>
                        </tr>
                        
                        


                            <?php 
                            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                                    
                                // Fetch the cart items from the session
                                $cartItems = $_SESSION['cart'];
                                $productsid = implode(',', $cartItems);
                                $query ="SELECT * FROM products WHERE product_id IN ($productsid)";
                                $result = mysqli_query($conn ,$query );
                                
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                                // Display the cart items
                                                echo '<tr class="align-middle">';
                                                echo'<td>'.$row["Product_ID"].'</td>'; 
                                                echo'<td><img class="max-100" src='.$row["Product_Image"].' alt=""></td>'; 
                                                echo'<td>'.$row["Product_Name"].'</td>'; 
                                                echo'<td>'.$row["Product_Price"].'</td>'; 
                                                echo'<td><a class="btn btn-xs pt-2 btn-danger" href="remove_from_cart.php?product_id='.$row["Product_ID"].'"><i class="bi bi-trash"></i></a></td>'; 
                                        
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo "";
                                    } 
                            }else{
                                echo "";   
                            }
                            ?>

                    </table>
                    
                    <button class="btn btn-danger float-end fw-bolder px-4 orderSubmit" >Submit order</button>
                    
<script>
function myFunction() {
  alert("order has been submited");
}
</script>
                </div>
            </div>
        </div>
    </div>
        
    
<?php include("assets/footer.php") ?>
        
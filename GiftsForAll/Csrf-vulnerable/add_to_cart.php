<?php
session_start();

// Check if the product_id parameter is present
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Initialize the cart if it doesn't exist in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Add the product to the cart
    $_SESSION['cart'][] = $productId;
    echo 'Product added to cart';
}

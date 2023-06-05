<?php
session_start();

// Check if the product_id parameter is present
if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Check if the 'cart' session variable exists
    if (isset($_SESSION['cart'])) {
        $cartItems = $_SESSION['cart'];

        // Find the index of the product ID in the cart array
        $index = array_search($productId, $cartItems);

        // Remove the product ID from the cart array if found
        if ($index !== false) {
            unset($cartItems[$index]);
        }

        // Re-index the cart array to ensure consecutive numeric keys
        $cartItems = array_values($cartItems);

        // Update the 'cart' session variable with the modified array
        $_SESSION['cart'] = $cartItems;
    }
}

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>

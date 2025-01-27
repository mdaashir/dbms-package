<?php
include("inc/connect.inc.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $food_item_id = intval($_POST['food_item_id']);
    $quantity = intval($_POST['quantity']);
    $user_id = $_SESSION['user_id']; // Assuming you have stored the user ID in the session

    // Check if quantity is greater than 0
    if ($quantity > 0) {
        // Insert into cart table
        $insert_query = "INSERT INTO cart (user_id, food_id, quantity) VALUES ($user_id, $food_item_id, $quantity) 
                         ON CONFLICT (user_id, food_id) DO UPDATE SET quantity = cart.quantity + $quantity";

        if (pg_query($conn, $insert_query)) {
            echo "Item added to cart successfully.";
        } else {
            echo "Error: " . pg_last_error($conn);
        }
    } else {
        echo "Quantity must be greater than 0.";
    }

    // Close the connection
    pg_close($conn);

    // Redirect back to the menu page
    header("Location: menu.php");
    exit();
}
?>
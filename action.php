<?php

include("includes/core.php");

$users = new User;
$cart = new Cart;
$cart_items = new CartItem;


/**
 * Cart Actions
 */
if (isset($_POST['add_to_cart'])) {
    echo $cart->addToCart($cart_items);
    
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'remove':
            removeFromCart();
            break;
        case 'update_qty':
            updateQuantity();
            break;
        case 'get_cart':
            getCart();
            break;
        default:
            echo "Invalid action";
    }
}

function removeFromCart()
{
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Find the index of the product in the cart
        $index = array_search($product_id, array_column($_SESSION['cart'], 'id'));

        if ($index !== false) {
            // Remove the product from the cart
            array_splice($_SESSION['cart'], $index, 1);
            echo "success";
        } else {
            echo "Product not found in the cart";
        }
    } else {
        echo "Invalid request";
    }

    exit();
}

function updateQuantity()
{
    if (isset($_GET['id']) && isset($_GET['quantity'])) {
        $product_id = $_GET['id'];
        $quantity = $_GET['quantity'];

        // Find the index of the product in the cart
        $index = array_search($product_id, array_column($_SESSION['cart'], 'id'));

        if ($index !== false) {
            // Update the quantity of the product in the cart
            $_SESSION['cart'][$index]['quantity'] = $quantity;
            echo "success";
        } else {
            echo "Product not found in the cart";
        }
    } else {
        echo "Invalid request";
    }

    exit();
}

function getCart()
{
    // Return the current cart content as JSON
    header('Content-Type: application/json');
    echo json_encode($_SESSION['cart']);
    exit();
}

/**
 * Logout
 */
if (isset($_GET['logout'])) {
$session->clear();

header('Location:login.php');

}



?>

<?php

include("includes/core.php");

$users = new User;
$cart = new Cart;
$cart_items = new CartItem;

/**
 * Cart Actions
 */
if (isset($_POST['add_to_cart'])) {

    /**
     * Check if there is a logged in user
     * True: Use model create record  in cart add cart items
     * False: Initialize cart in session
     *  */

    // var_dump($session->get('id'));die;

    if ($session->checkLoginStatus()) {
        // Check if cart exist
        if ($cart->checkUserCart($session->get('id')) == false) {
            // Initialize Cart
            $cart->create(['user_id'=>$session->get('id')]);
        }
        try {
            $cart_id = $cart->getUserCart($session->get('id')); // Getting the cart item
            
            // Check if product is already there for that user
            $existingCartItem = $cart_items->where(['cart_id' => $cart_id, 'product_id' => $_POST['product_id']]);

            if ($existingCartItem) {
                // Product already exists in the cart, increment the quantity
                $newQuantity = $existingCartItem[0]->quantity + 1;
                $cart_items->update($existingCartItem[0]->id, ['quantity' => $newQuantity]);

            } else {
                // Product is not in the cart, create a new cart item
                $cart_items->create(['cart_id' => $cart_id, 'product_id' => $_POST['product_id'], 'quantity' => 1]);
            }

            // Count the number of items in cart
          echo  $cart->countRelated('cart_items', $cart_id, 'cart_id');

        } catch (PDOException $error) {
            // echo $error->message;
        }
    } else { // When user is not logged in

    }
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

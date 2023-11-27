<?php
class Cart extends Model
{
    //    
    protected $table = 'carts';
    // Attributes
    public $user_id;

    public function addCart()
    {
        // Check if user has cart

        // Add new cart for user
    }

    /**
     * Check if user's cart exists
     */
    public function checkUserCart($user_id)
    {
        if (count($this->where(['user_id' => $user_id])) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get User cart
     */
    public function getUserCart($user_id)
    {
        foreach ($this->where(['user_id' => $user_id]) as $cart) {
            return $cart->id;
        }
    }

    public function sessionCart(){

    }

    public function addToCart(CartItem $cart_items){

        $session = new SessionManager;
        /**
     * Check if there is a logged in user
     * True: Use model create record  in cart add cart items
     * False: Initialize cart in session
     *  */

    // var_dump($session->get('id'));die;

    if ($session->checkLoginStatus()) {
        
        // Check if cart exists for the logged-in user
        if ($this->checkUserCart($session->get('id')) == false) {
            // Initialize Cart for the logged-in user
            $this->create(['user_id' => $session->get('id')]);
        }
    
        try {
            $cart_id = $this->getUserCart($session->get('id')); // Getting the cart item
    
            if(isset($_SESSION['cart_token'])){
                $this->mergeSessionCartWithUserCart($cart_id, $cart_items);
                // setcookie('cart_token', '', time() - 3600, '/'); // Unset the cookie
                unset($_SESSION['cart']);
                unset($_SESSION['cart_token']);
                return;
            }

            // Check if the product is already there for that user
            $existingCartItem = $cart_items->where(['cart_id' => $cart_id, 'product_id' => $_POST['product_id']]);
    
            if ($existingCartItem) {
                // Product already exists in the cart, increment the quantity
                $newQuantity = $existingCartItem[0]->quantity + 1;
                $cart_items->update($existingCartItem[0]->id, ['quantity' => $newQuantity]);
            } else {
                // Product is not in the cart, create a new cart item
                $cart_items->create(['cart_id' => $cart_id, 'product_id' => $_POST['product_id'], 'quantity' => 1]);
            }
    
            // Count the number of items in the cart
            return $this->countRelated('cart_items', $cart_id, 'cart_id');
    
        } catch (PDOException $error) {
            // Handle the exception if needed
        }
    } else { // When the user is not logged in
        // Check if there is a cart in session
        if (!isset($_SESSION['cart'])) {
            // Initialize the cart in the session
            $_SESSION['cart'] = [];
        }
    
        // Check if the product is already in the session cart
        $existingCartItem = array_filter($_SESSION['cart'], function ($item) {
            return $item['product_id'] == $_POST['product_id'];
        });
    
        if ($existingCartItem) {
            // Product already exists in the session cart, increment the quantity
            $existingCartItemKey = key($existingCartItem);
            $_SESSION['cart'][$existingCartItemKey]['quantity']++;
        } else {
            // Product is not in the session cart, add a new cart item
            $_SESSION['cart'][] = ['product_id' => $_POST['product_id'], 'quantity' => 1, ];
        }
    
        // Count the number of items in the session cart
        return count($_SESSION['cart']);
    }
    }

    // Function to merge the session cart with the user's cart
protected function mergeSessionCartWithUserCart($userCartId, $cart_items) {
    // Fetch the cart items from the session using the token
    $sessionCartItems = (object) $_SESSION['cart'];

    // var_dump($sessionCartItems);die;

    // If there are items in the session cart, add them to the user's cart
    if (!empty($sessionCartItems)) {
        foreach ($sessionCartItems as $sessionCartItem) {
            // Check if the same product is already in the user's cart
            $existingCartItem = $cart_items->where(['cart_id' => $userCartId, 'product_id' => $sessionCartItem['product_id']]);

            if ($existingCartItem) {
                // Product already exists in the user's cart, increment the quantity
                $newQuantity = $existingCartItem[0]->quantity + $sessionCartItem['quantity'];
                $cart_items->update($existingCartItem[0]->id, ['quantity' => $newQuantity]);
            } else {
                // Product is not in the user's cart, create a new cart item
                $cart_items->create(['cart_id' => $userCartId, 'product_id' => $sessionCartItem['product_id'], 'quantity' => $sessionCartItem['quantity']]);
            }
        }
    }
}
}
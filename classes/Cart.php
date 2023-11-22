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
}
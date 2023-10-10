<?php
class CartItem extends Model{
    protected $table = 'cart_items';
    public $cart_id;
    public $product_id;
    public $quantity;

    
   

}
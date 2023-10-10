<?php
class OrderItem extends Model{
    protected $table = 'order_item';
    public $unit_price;
    public $total_price;
    public $quantity;
    public $order_id;
    public $product_id;


    
   

}
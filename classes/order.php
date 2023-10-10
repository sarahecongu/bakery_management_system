<?php
class Order extends Model{
    protected $table = 'orders';
    public $status;
    public $total_amount;
    public $image;
    public $user_id;
    public $order_date;


    
   

}
<?php
class Payment extends Model{
    protected $table = 'payments';
    public $amount;
    public $payment_method;
    public $payment_date;
    public $transaction_id;
    public $order_id;


    
   

}
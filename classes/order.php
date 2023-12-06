<?php
class Order extends Model{
    protected $table = 'orders';
    public $status;
    public $user_id;

    public function getLatestOrder($user_id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = ' . (int)$user_id . ' ORDER BY created_at DESC LIMIT 1';
        $result = $this->connection->query($query);
    
        return $result->fetch(PDO::FETCH_OBJ);
    }
    
  
  
    public function getUser($user_id){
        foreach ($this->where(['user_id' => $user_id]) as $order) {
            return $order->id;
        }
    }

}
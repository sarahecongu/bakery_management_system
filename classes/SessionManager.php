<?php
class SessionManager{
    // for starting the session
    public function start(){
        session_start();
    }
    // for clearing 
    public function clear(){
        session_destroy();
    }
    // adding data

    public function add($data){
        foreach ($data as $key=> $d) {
            $_SESSION[$key] = $d;
        }
        
    }
}
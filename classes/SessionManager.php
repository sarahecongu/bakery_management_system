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

    public function checkIsUserLoggedIn()
    {
        if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function add($data){
        foreach ($data as $key=> $d) {
            $_SESSION[$key] = $d;
        }

        return true;
        
    }
    
}
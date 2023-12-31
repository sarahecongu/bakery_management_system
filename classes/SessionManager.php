<?php
class SessionManager
{
    // for starting the session
    public function start()
    {
        session_start();
    }
    // for clearing 
    public function clear()
    {
        session_destroy();
    }
    // adding data


    public function add($data)
    {
        foreach ($data as $key => $d) {
            $_SESSION[$key] = $d;
        }
        return true;
    }

    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function getAll()
    {
        return $_SESSION;
    }

    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public function removeAll()
    {
        session_unset();
        session_destroy();
    }
        
    public function checkLoginStatus()
    {
        if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
            return true;
        } else
            return false;
    }
    public function addCookie(array $data, $expiration = 0, $path = '/') {
        foreach ($data as $key => $value) {
            setcookie($key, $value, $expiration, $path);
        }
    }

    public function unsetCookie(array $cookieNames, $path = '/') {
        foreach ($cookieNames as $name) {
            setcookie($name, '', time() - 3600, $path); // Set the cookie to expire in the past to delete it
        }
    }
}
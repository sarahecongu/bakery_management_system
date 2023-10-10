<?php
// session_start();
require_once './includes/classes_autoload.inc.php';
require_once './config/dbh.php'; 
$user = new User();
if (!$user->checkIsUserLoggedIn()) {
  header('Location:login.php');
}
include_once 'index.php';

<?php 
if (!$session->checkLoginStatus()) {
  header('Location:login.php');
  exit;
}
<?php
include("includes/core.php");
$user = new User();
if (!$user->checkIsUserLoggedIn()) {
  header('Location:login.php');
}
include('index.php');

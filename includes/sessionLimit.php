<?php
if (!$session->checkLoginStatus()) {
  header('Location:login.php');
  exit;
}

if ($session->checkLoginStatus()) {
  $user_types = new UserType;
  $user_type = $user_types->find($session->get('user_type_id'));
  $role = strtolower($user_type->user_type);
  switch ($role) {


    case 'admin':
      break;
    case 'baker':
      break;
    case 'cashier':
      break;
    case 'customer':
      header('Location:index.php');

      break;

    default:
      header('Location:login.php');
      break;
  }
  # code...
}
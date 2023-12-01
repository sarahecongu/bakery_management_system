<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/dashboard.css">

  <title>END OF YEAR</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      box-sizing: border-box;
    }

    body {
      display: flex;
    }
    .hr{
     
      padding: .1rem;
      
    }
    hr{
      background-color: white;
    }
    .sidebar {
      position: sticky;
      top: 0;
      left: 0;
      bottom: 0;
      width: 150px;
      height: 100vh;
      padding: 0 1.7rem;
      color: whitesmoke;
      overflow: hidden;
      transition: all 0.5s linear;
      background-color: rgb(76, 9, 9);
      overflow: auto;

    }

    .sidebar:hover {
      width: 280px;
      transition: 0.5s;
    }


    .logo {
      height: 80px;
      padding: 16px;

    }

    .menu {
      height: 100%;
      position: relative;
      list-style: none;
      padding: 0;

    }
 
    .menu li {
      padding: .5rem;
      margin: 8px 0;
      border-radius: 8px;
      transition: all 0.5s ease-in-out;
    }

    .menu li:hover,
    .active {
      background-color: #d8bfd8;


    }

    .active {
      color: rgb(76, 9, 9);
    }

    .menu a {
      color: white;
      font-size: 14px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .menu a span {
      overflow: hidden;
    }

    .menu a i {
      font-size: 1.2rem;
    }


    /* main */
    .main-content {
      position: relative;
      background: wheat;
      width: 100%;
      /* padding: 1rem; */
    }

    .header-wrapper img {
      width: 50px;
      height: 50px;
      cursor: pointer;
      border-radius: 50%;
    }

    .header-wrapper {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      align-items: center;
      background-color: rgb(76, 9, 9);
      border-radius: 5px;
      color: white;
      padding: 5px 2rem;
      margin-bottom: 1rem;
    }

    .header-title {
      color: white;

    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 1;

    }

    /* cards */
    .card-container {
      /* background-color: #fff; */
      padding: 0.5rem;
      border-radius: 10px;

    }

    .card-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .main-title {
      color: black;
      padding-bottom: 10px;
      font-size: 25px;
    }

    .user-card {
      /* background: red; */
      border-radius: 10px;
      padding: 1.5rem;
      width: 180px;
      height: 100px;
      display: flex;
    
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.5s ease-in-out;
      /* margin: auto; */
    }

    .payment-card:hover {
      transform: translateY(-5px);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-self: center;
      margin-bottom: 20px;
    }

    .total {
      display: flex;
      /* flex-direction: column; */
    }

    .title {
      font-size: 22px;
      font-weight: bold;
    }

    .value {
      font-size: 24px;
      font-weight: bold;
    }

    .btns {
      margin-top: 1rem;
      /* display: inline-block; */
      padding: .3rem 1rem;
      background: rgb(76, 9, 9);
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      border-color: rgb(76, 9, 9);
      border-radius: 5px;
    }
   .bt{
    background: rgb(76, 9, 9);
    border-color: rgb(76, 9, 9);
    border-radius: 5px;
    color: #fff;
    font-size: 1rem;
    padding: 8px;
   }
    thead{
      background-color: rgb(76, 9, 9);
    }

    .icon {
      color: white;
      padding: 1rem;
      height: 60px;
      width: 60px;
      /* text-align: center; */
      /* border-radius: 50%; */
      font-size: 1.5rem;
      /* background: white; */
    }

    .tabular-wrapper {
      /* background: white; */
      margin-top: 1rem;
      border-radius: 10px;
      /* padding: 2rem; */
    }

    .table-container {
      width: 100%;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    .logout-link {
      color: #ffffff;
      text-decoration: none;
      padding: 8px 15px;
      background-color: #ff0000;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .logout-link:hover {
      background-color: #cc0000;
      color: white;
    }




  /* Mobile-first styles */
  @media only screen and (max-width: 600px) {
    .sidebar {
      width: 100%;
      padding: 0.5rem;
    }

    .sidebar:hover {
      width: 100%;
    }

    .main-content {
      padding: 1rem;
    }

    .header-wrapper {
      padding: 5px;
      flex-direction: column;
    }

    .header-title {
      font-size: 18px;
    }

    .card-wrapper {
      flex-direction: column;
    }

    .user-card {
      width: 100%;
    }

    .card-header {
      flex-direction: column;
      align-items: center;
      margin-bottom: 10px;
    }

    .btns {
      margin-top: 0.5rem;
    }

    .bt {
      padding: 5px;
      font-size: 0.8rem;
    }

    .tabular-wrapper {
      margin-top: 0.5rem;
    }
  }

  /* Tablet styles */
  @media only screen and (min-width: 601px) and (max-width: 1024px) {
    .sidebar {
      width: 200px;
    }

    .sidebar:hover {
      width: 200px;
    }

    .main-content {
      padding: 1rem;
    }

    /* Add any additional styles for tablets here */
  }

  /* Desktop styles */
  @media only screen and (min-width: 1025px) {
    /* Your existing styles for desktop screens */
  }


  </style>

</head>
<?php
include("alert.php");

?>

<!DOCTYPE html>
<html class="no-js" lang="">
<?php require_once('lib/Database.php');
  ?>
<?php require_once('lib/Session.php');
     Session::init();
    ?>
<?php require_once('helpers/format.php');?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Online Eventmenagement</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="css/jquery.min.js"></script>
    <script type="css/bootstrap.min.js"></script>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="../css/main.css"> 
 
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  

</head>
<body>
 <div class="body">
  <?php
   
      if(isset($_GET['$action'])){
              Session::destroy();
               header("Location:login.php");
    }


  ?>
  <div class="box">
 <header class="headersection">
    <div class="container nopad">
      <div class="logo">
        <div class="brand">
          <h2>Online Event Management</h2>
        </div>
        <div class="cart">
            
            </div>
        <div class="search">
       <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
         <a href="#"><i class="fas fa-shopping-cart cart" style="font-size:25px;
        font-size:35;margin-right:10px;"></i></a>
        <a href="cart.php" title="View my shopping cart" style="margin-right:10px;" rel="nofollow">
                <span class=''>Cart</span>
                <span style="color:red;">
                  <?php

                  $db =new Database();
                  $sid = session_id();
                  $query = "SELECT * FROM tbl_cart WHERE sid='$sid'";
                  $getData = $db->select($query);
                  if($getData){
                  $sum = Session::get("sum");
                  echo "$".$sum;
                }else{
                  echo"(Empty)";
                

                }

                  ?>
                </span>
              </a>
      
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
      <?php
       $login =Session::get("customerId");
        if($login==false){ ?>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="text-decoration:none; margin-right:10px;"><a href="login.php">Login</a></button>
         
 <?php  } else { ?>
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="text-decoration:none;"><a href="?$action=<?php Session::get('customerId');?>">Logout</a></button>
 <?php } ?>



     
    </form>
       
    
      </div>
      </div>

    <div class="menu">
       <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="#">Event Types</a>
            <ul>
              <li><a href="Wedding.php">Wedding</a></li>
              <li><a href="Birthday.php">Birthday</a></li>
            </ul>
         </li>
         <li><a href="photographer.php">Photographer</a>
            
         </li>
         <li><a href="Register.php">Register</a></li>
         <?php
         $login =  Session::get('customerId');
            if($login==true){
         ?>
         <li><a href="profile.php">profile</a></li>
       <?php } ?>

          
           <li><a href="cart.php">Cart</a></li>
         <li><a href="contact.php">Contact</a></li>



       </ul>
    </div>
      </div>
 </header>

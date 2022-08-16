<?php
require 'config/config.php';
if(isset($_SESSION['username']))
{
     $userLoggedIn=$_SESSION['username'];
     $user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
     $user=mysqli_fetch_array($user_details_query);
    }
else{
    header("Location:register.php");
}

?>
<html>
    <head>
        <title>Welcome to titaniaverse</title>
        <!--javascript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/ab9853187e.js" crossorigin="anonymous"></script>
        <!--css-->
       
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">  
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">     
    </head>
<body>
  <div class="top_bar">
    <div class="logo">
       <a href=index.php>Sri Balaji Sat System</a>
</div>
<nav>
    <a id="username" href="#"><?php echo $user['username'] ?>
    <a href="#"><i class="fa fa-home fa-lg"></i>Home </a>
    <a href="#"><i class="fa-solid fa-clipboard-list"></i>Package </a>
    <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
</div>
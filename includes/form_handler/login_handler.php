<?php

if(isset($_POST['login_button'])) 
{
    
  $email = filter_var($_POST['email_login'], FILTER_SANITIZE_EMAIL);

  $_SESSION['email_log'] = $email; // store email into session variable
  $password = md5($_POST['password_login']);

  $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
  $check_login_query = mysqli_num_rows($check_database_query);
  
if($check_login_query == 1) 
{
  $row = mysqli_fetch_array($check_database_query);
  $username = $row['username'];
  $_SESSION['username'] = $username;
  header("Location: index.php");
  exit();
}
else
{
  array_push($error_array,"Email or password is incorrect");
}
}
?>
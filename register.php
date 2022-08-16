<?php
require 'config/config.php';
require 'includes/form_handler/register_handler.php';
require 'includes/form_handler/login_handler.php';
?>
<html>
<head>
    <title>Welcome to titaniaverse</title> 
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script> 
</head>

<body>
 <?php 
   if(isset($_POST['button'])) {
    echo '
      <script>
      $(document).ready(function() {
      $("#first").hide();
      $("#second").show();
      });
      </script>
    ';
   }
 ?>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <h1>SRI BALAJI SAT SYSTEM</h1>
        <h3>login or sign up below!</h3>
      </div>
      <div id="first">
        <form action=register.php method="POST">
          <input type="text" name="email_login" placeholder="email id" value=<?php if (isset($_SESSION['email_log'])) {
          echo $_SESSION['email_log'];}?>>
          <br>
          <input type="text" name="password_login" placeholder="password">
          <br>
          <input type="submit" name="login_button" value="login">
          <br>
          <?php if (in_array("Email or password is incorrect", $error_array))
           echo "Email or password is incorrect";
          ?>
          <br>
          <a href="#" id="signup" class="signup">Need an account? Register here!</a>
        </form>
      </div>
        
      <div id="second">
        <form action=register.php method="POST">
           <input type="text" name="Username" placeholder="Username" value="<?php if (isset($_SESSION['user_name']))
              { echo $_SESSION['user_name'];}?>">
              <br>
              <?php if (in_array("your username must be between 2 and 25 characters!<br>", $error_array))
               {
                echo "your username must be between 2 and 25 characters!<br>";
               }?>
           <input type="text" name="email" placeholder="mail id" value="<?php if (isset($_SESSION['reg_lname'])) {
             echo $_SESSION['mail'];}?>" >
              <br>  
              <?php if (in_array("Email aready in use<br>", $error_array)) {
               echo "Email aready in use<br>";} ?> 
            <input type="text" name="password" placeholder="password">
              <br>
              <?php if (in_array("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br>", $error_array)) {
               echo "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br>";}
              ?>
            <input type="submit" name="button" value="register">
              <?php if (in_array("<span style='color:#14C800;'> Registration successfull!</span><br>", $error_array)) {
              echo "<span style='color:#14C800;'> Registration successfull!</span><br>";}
               ?>
            <a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
    
        </form>
      </div>
    </div>
  </div>
    
</body>
</html>

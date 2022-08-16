
<?php
#session start is to store values.when one error comes the user might have to start typing values from the first,which is not 
#comfortable.Hence remembering values will be helpful.
#to insert into the database
$query=mysqli_query($con,"INSERT INTO test VALUES('','titania')");
#below are the variables that I use to get values from the user.
$fname="";
$em="";
$password="";
$date="";
$error_array=array();
#handling the form
#is button is pressed then:
if(isset($_POST['button']))
{
   
   $fname=strip_tags($_POST['Username']);
   $_SESSION['user_name']=$fname; //stores 
   #post is getting values post from html
   #strip_tags for security measure to strip of any html tags the user enters 
   $fname=str_replace(' ','',$fname);#remove spaces
   $fname=strtolower($fname);  #lowercase
   $em=strip_tags($_POST['email']);
   $_SESSION['mail']=$em;
   $password=strip_tags($_POST['password']);
   $_SESSION['pass_word']=$password;
   $date=date("Y-m-d");
   $_SESSION['date']=$date;
   
    //checking if the email id is valid
  if(filter_var($em,FILTER_VALIDATE_EMAIL))
   {
     $em=filter_var($em,FILTER_VALIDATE_EMAIL);
     $e_check=mysqli_query($con,"SELECT email FROM users WHERE email='$em'");
     //count the number of rows returned
     $num_rows=mysqli_num_rows($e_check);
     if($num_rows>0)
      {
       array_push($error_array,"email already in use <br>");
      }
   }
  if(strlen($fname)>25 || strlen($fname)<2)
   {
     array_push($error_array,"your username must be between 2 and 25 characters!<br>");
   } 

   $uppercase = preg_match('@[A-Z]@', $password);
   $lowercase = preg_match('@[a-z]@', $password);
   $number    = preg_match('@[0-9]@', $password);
   $specialChars = preg_match('@[^\w]@', $password);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
   {
    array_push($error_array,'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.<br>');
   }
  if(empty($error_array))
  {
    $password=md5($password);
    $profile_pic="assests\images\profile_pics\defaults\github_dp.jpg";
    $query=mysqli_query($con,"INSERT INTO users VALUES('','$fname','$em','$password','$profile_pic')");
    
    array_push($error_array,"<span style='color:#14C800;'> Registration successfull!</span><br>");
    $_SESSION['user_name']="";
    $_SESSION['mail']="";
    $_SESSION['pass_word']="";
  }

}
?>
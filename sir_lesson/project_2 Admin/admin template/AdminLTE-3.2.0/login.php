<?php
if (isset($_POST['submit'])) {
   require_once "dbconfig.php";
   session_start();
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password);

   $result=$db->query("SELECT* FROM users WHERE email='$email' AND password='$password'");
    $row=$result->fetch_assoc();


   if($result->num_rows==0){
    $_SESSION['error']="Email or password is wrong";
     header("location:index.php");
     
   }else{
    $_SESSION['name']=$row['fullname'];
    $_SESSION['email']=$email;
    header("location:dashboard.php");
   }
}


?>
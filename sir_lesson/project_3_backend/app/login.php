<?php 
          require_once "dbconfig.php";

          session_start();

          if (isset($_REQUEST['submit'])) {
            extract($_REQUEST);


            $pass=md5($password);
            $sql="SELECT* FROM users WHERE email='$email' AND password='$pass'";

            

            $row=$conn->query($sql);
            $result=$row->fetch_assoc();

            if ($row->num_rows==0) {
                $_SESSION['login_error']="Email or password is wrong.Please try again";
              header("location:index.php");
            }else{
                $_SESSION['email']=$email;
                $_SESSION['fullname']=$result['fullname'];
              header("location:dashboard.php");
            }
          }
          ?>
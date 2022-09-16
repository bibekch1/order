<?php include('../config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>

    <div class="main">
        <div class="login-form">
            
            <h1> login form</h1>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo$_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <form action="" method="post">
                <p>user name</p>
                <input type="text"name="username" placeholder="user name">
                <p>password</p>
                <input type="password" name="password" placeholder="password">
                <input type="submit" name="submit" value="login" class="btn">
                
            </form>
        </div>
    </div>
</body>
</html>


<?php
 //check whether the submit button is clicked or not
 if(isset($_POST['submit']))
 {
     //process for login
     //1. Get the data from login form
     $username= mysqli_real_escape_string($conn, $_POST['username']);
     $password= mysqli_real_escape_string($conn, md5($_POST['password']));

     //2. SQL query to check whether the user with the username and password exist or not
     $sql= "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

     //3. Execute the querry
     $res = mysqli_query($conn, $sql);


     //4. count rows to check whether the user exists or not
     $count = mysqli_num_rows($res);


     if($count==1)
     {
         //get details
         $row=mysqli_fetch_assoc($res);

         $_SESSION['image_name']= $row['image_name'];
         //user available and login success
         $_SESSION['login']="<div class='success'>Login Successfull.</div>";
         $_SESSION['user']=$username;//to check whether the user is logged in or not        
         header('location:'.SITEURL.'admin/');
     }
     else
     {
         //user not available and login fail
         $_SESSION['login']="<div class='error'>user or password donot match.</div>";
         header('location:'.SITEURL.'admin/login.php');
     }

 }


 ?>
<?php 
include('../config/constants.php'); 
include('login-check.php');



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin pannel</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css link  -->
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <!-- header section start -->
    <header>

    <?php
        //create sql query to select data from database
        $sql = "SELECT * FROM tbl_admin WHERE admin_type='super admin' ";

        //execute qury
        $res = mysqli_query($conn, $sql);

        //check if query executed or not
        if($res==true)
        {
            $row = mysqli_fetch_assoc($res);

            $username = $row['username'];
            $admin_type = $row['admin_type'];
        }
    ?>

    <p class="logo" ><i class="fas fa-utensils"></i>Real Test Restro.</p>
     
        <nav class="navbar">
            <a href="<?php echo SITEURL; ?>/admin/index.php" >Home</a>

            <?php
                //check for super admin
                if($_SESSION['user'] == $username)
                {
                    ?>
                    <a href="<?php echo SITEURL; ?>/admin/manage-admin.php" >admin</a>
                    <?php
                }
            ?>
            
            <a href="<?php echo SITEURL; ?>/admin/manage-menu.php" >Menu</a>
            <a href="<?php echo SITEURL; ?>/admin/manage-offers.php" >offers</a>
            <a href="<?php echo SITEURL; ?>/admin/manage-review.php" >review</a>
            <a href="<?php echo SITEURL; ?>/admin/manage-reservation.php">reservation</a>
            <a href="<?php echo SITEURL; ?>/admin/manage-order.php">order</a>
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
        </div>
        <div class="user-wrapper">

            <?php
                if(isset($_SESSION))
                {
                    
                    ?>
                    <img src="<?php echo SITEURL;?>image/admin/<?php echo $_SESSION['image_name'];?>" alt="">
                    <?php
                }
                
             
            ?>
            
            <div >
                <h3>
                    <?php echo $_SESSION['user']; ?>
                </h3>
                <?php
                    //check for super admin
                    if($_SESSION['user'] == $username)
                    {
                                
                      echo "<small>superuser</small>";
                                
                    }
                    else
                    {
                       echo "<small>user</small>";
                    } 
                        
                ?>
                
            </div>
            <div><a href="logout.php" ><span>log out</span></a></div>
        </div>

    </header>
    <!-- header section end -->

<?php include('config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurent</title>
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- custom css link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body >
    <!-- header section start -->
    <header>

        <p class="logo" ><i class="fas fa-utensils"></i>Real Test Restro.</p>
     
        <nav class="navbar">
            <a href="<?php echo SITEURL; ?>" >Home</a>
            <a href="<?php echo SITEURL; ?>menu.php" >Menu</a>
            <a href="<?php echo SITEURL; ?>about.php" >About Us</a>
            <a href="<?php echo SITEURL; ?>reservation.php" >reservation</a>
            <a href="<?php echo SITEURL; ?>order.php" >order</a>
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="<?php echo SITEURL; ?>reservation.php" class="fas fa-newspaper"></a>
            <a href="<?php echo SITEURL; ?>order.php" class="fas fa-shopping-cart"></a>
        </div>

    </header>
    <!-- header section end -->

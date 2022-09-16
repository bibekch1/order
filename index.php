<?php include('partials-front/header.php'); ?>


    <!-- home section starts -->
    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special feature</span>
                        <h3>online order</h3>
                        <p>using this feature you can easily order food and cash on delivery.</p>
                        <a href="<?php echo SITEURL; ?>order.php" class="btn">online order</a>
                    </div>
                    <div class="image">
                        <img src="image/home-1.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>our special feature</span>
                        <h3>reservation</h3>
                        <p>using this feature you can easily reserve table for the date and time you want.</p>
                        <a href="<?php echo SITEURL; ?>reservation.php" class="btn">table reservation</a>
                    </div>
                    <div class="image">
                        <img src="image/home-2.png" alt="">
                    </div>
                </div>
            </div>

            <div class="swiper-pagination"></div>
            
        </div>
    </section> 
    <!-- home section end -->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        if(isset($_SESSION['reservation']))
        {
            echo $_SESSION['reservation'];
            unset($_SESSION['reservation']);
        }
        if(isset($_SESSION['submit']))
        {
            echo $_SESSION['submit'];
            unset($_SESSION['submit']);
        }
    ?>





<?php include('partials-front/offers.php'); ?>

<?php include('partials-front/footer.php'); ?>
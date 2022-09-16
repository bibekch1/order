
    <!-- review section starts -->
    <section class="review" id="review">

        <h3 class="sub-heading">customer's review</h3>
        <h1 class="heading">what they say</h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <?php
                    //create a sql query to get data from database
                    $sql = "SELECT * FROM tbl_review WHERE active='yes'";

                    //execute query
                    $res = mysqli_query($conn, $sql);

                    //count row
                    $count = mysqli_num_rows($res);


                    //check if we have data or not
                    if($count > 0)
                    {
                        //we have data in database get data
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $customer_name = $row['customer_name'];
                            $review = $row['review'];
                            $image_name = $row['image_name'];
                            ?>

                            <div class="swiper-slide slide">
                                <i class="fas fa-quote-right"></i>
                                <div class="user">
                                   
                                    <img src="<?php echo SITEURL; ?>image/customer/<?php echo $image_name; ?>" alt="">
                                       
                                    <div class="user-info">
                                        <h3><?php echo $customer_name; ?></h3>
                                        <!-- <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div> -->
                                    </div> 

                                </div>
                                <p><?php echo $review; ?></p>
                            </div>

                            <?php

                        }
                    }
                ?>

                

            </div>

        </div>

    </section>
    <!-- review section ends -->

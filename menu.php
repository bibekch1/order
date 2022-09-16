<?php include('partials-front/header.php'); ?>


    <!-- menu section starts here -->
    <section class="menu" id="menu" style="margin-top:6rem;">

        <h3 class="sub-heading">Menu</h3>
        <h1 class="heading">Our Food</h1>


        <form action="#" method="post"></form>
        <div class="box-container">


            <?php
                //create querry to display menu items from database
                $sql = "SELECT * FROM tbl_menu WHERE active='yes'";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check if menu item is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //item available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //set the value like id, name, image_name
                        $id = $row['id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
            ?>

                        <div class="box">
                            <div class="image">
                                <?php

                                    //check if image is available or not
                                    if($image_name=="")
                                    {
                                        //display message
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                ?>
                                        <img src="<?php echo SITEURL; ?>image/menu/<?php echo $image_name; ?>" alt="">
                                        <a href="<?php echo SITEURL; ?>image/menu/<?php echo $image_name; ?>" class="fas fa-eye" target="blank"></a>

                                <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="content">
                                <!-- <div class="starts">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div> -->
                            
                                <h3><?php echo $name; ?></h3>
                                <p><?php echo $description; ?></p>
                            
                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn">order</a>
                                <span class="price">RS.<?php echo $price; ?></span>
                            </div>
                        </div>


            <?php
                    }
                }
                else
                {
                    //item not available
                    echo "<div class='error'>Food not added.</div>";
                }
            ?>
            



        </div>
    </section>
    <!-- menu section ends here -->



<?php include('partials-front/offers.php'); ?>

<?php include('partials-front/footer.php'); ?>
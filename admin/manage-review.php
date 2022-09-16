<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage review</h1>

            <?php
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['no-review-found']))
                    {
                        echo $_SESSION['no-review-found'];
                        unset($_SESSION['no-review-found']);
                    }

            ?>

            <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>s.n</th>
                        <th>customer name</th>
                        <th>review</th>
                        <th>active</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>

                    <?php

                        //get data from data base
                        //create sql query
                        $sql = "SELECT * FROM tbl_review  ORDER BY ID DESC ";

                        //execute query
                        $res=mysqli_query($conn, $sql);

                        //count rows
                        $count = mysqli_num_rows($res);

                        //count serial number
                        $sn=1;

                        //check if we havw data in database or not
                        if($count > 0)
                        {
                            //we have data
                            //get data from databse
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $customer_name = $row['customer_name'];
                                $review = $row['review'];
                                $image_name = $row['image_name'];
                                $active = $row['active'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $review; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <?php 
                                            //check if image name is availabele or not
                                            if($image_name!="")
                                            {
                                                //display the image
                                                ?>

                                                <img src="<?php echo SITEURL;?>image/customer/<?php echo $image_name;?>" width="100px">

                                                <?php
                                            }
                                            else
                                            {
                                                //display the message
                                                echo "<div class='error'>Image not added.</div>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-review.php?id=<?php echo $id; ?>" class="btn-green">update review</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-review.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-red">delete review</a>
                                    </td>
                                </tr>

                                <?php

                            }
                        }

                    ?>

                    
                </table>
            </div>
            
        </div>
    </section>

    <!-- main content section ends here -->

<?php include('partials/footer.php'); ?>
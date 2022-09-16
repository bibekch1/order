<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage menu</h1>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-item-found']))
                {
                    echo $_SESSION['no-item-found'];
                    unset($_SESSION['no-item-found']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['failed-remove']))
                {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                }
            ?>

            
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"><h3>add food</h3></a>

            </br>
            </br>

            <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>s.n</th>
                        <th>name</th>
                        <th>description</th>
                        <th>price</th>
                        <th>image</th>
                        <th>active</th>
                        <th>actions</th>
                    </tr>

                    <?php
                        //query to get all catagories from database
                        $sql = "SELECT * FROM tbl_menu";

                        //execute query
                        $res=mysqli_query($conn, $sql);

                        //count rows
                        $count= mysqli_num_rows($res);

                        //create serial number
                        $sn=1;

                        //check whether we have data in database or not 
                        if($count>0)
                        {
                            //we have data
                            //get data from database
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id  = $row['id'];
                                $name = $row['name'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $active = $row['active'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td>Rs.<?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                //check if image name is availabele or not
                                                if($image_name!="")
                                                {
                                                    //display the image
                                                    ?>

                                                    <img src="<?php echo SITEURL;?>image/menu/<?php echo $image_name;?>" width="100px">

                                                    <?php
                                                }
                                                else
                                                {
                                                    //display the message
                                                    echo "<div class='error'>Image not added.</div>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-item.php?id=<?php echo $id;?>" class="btn-green">update item</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-item.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-red">delete item</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data
                            //display message inside table
                            ?>
                            <tr>
                                <td colspan="8"><div class="error">no food added</div></td>
                            </tr>

                            <?php
                        }
                    ?>
                        
                    
                </table>
            </div>
        </div>
    </section>

    <!-- main content section ends here -->

<?php include('partials/footer.php'); ?>
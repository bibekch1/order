<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage admin</h1>

            <?php
                if(isset($_SESSION['add']))//checking wheather session is set or not
                {
                    echo $_SESSION['add']; //display session message
                    unset($_SESSION['add']); //remove session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
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

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['password-not-match']))
                {
                    echo $_SESSION['password-not-match'];
                    unset($_SESSION['password-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                if(isset($_SESSION['username-already-exist']))
                {
                    echo $_SESSION['username-already-exist'];
                    unset($_SESSION['username-already-exist']);
                }
            ?>
            <br>

            <a href="<?php echo SITEURL; ?>admin/add-admin.php" class="btn-primary"><h3>add admin</h3></a>

            </br>
            </br>

            <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>s.n</th>
                        <th>full name</th>
                        <th>username</th>
                        <th>image</th>
                        <th>actions</th>
                    </tr>

                    <?php
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute theQuery
                        $res = mysqli_query($conn, $sql);

                        //Check whether the Query is Executed or not
                        if($res==TRUE)
                        {
                            //count Rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res); //function to get all the rows in database

                            $sn=1; //create a variable and assign a value

                            //check the number of rows
                            if($count>0)
                            {
                                //we have dtabase
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get all the data from database
                                    //and while loop will run as longas we have data in database

                                    //get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    $image_name=$rows['image_name'];
                                    $admin_type=$rows['admin_type'];

                                    //display the values in our table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <?php 
                                                //check if image name is availabele or not
                                                if($image_name!="")
                                                {
                                                    //display the image
                                                    ?>

                                                    <img src="<?php echo SITEURL;?>image/admin/<?php echo $image_name;?>" width="100px">

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
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">change password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-green">update admin</a>

                                        <?php 

                                            //check for super admin
                                            if($admin_type !="super admin")
                                            {
                                                ?>      
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-red">delete admin</a>
                                                <?php
                                            }
                                        ?>
                                        
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //we donot have database
                            }
                        }
                    ?>

                    

                    
                </table>
            </div>
            
        </div>
    </section>

    <!-- main content section ends here -->

<?php include('partials/footer.php'); ?>
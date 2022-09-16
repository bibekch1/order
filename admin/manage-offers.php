<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage offer</h1>

            <?php

                if(isset($_SESSION['offer']))
                {
                    echo $_SESSION['offer'];
                    unset($_SESSION['offer']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['no-offer-found']))
                {
                    echo $_SESSION['no-offer-found'];
                    unset($_SESSION['no-offer-found']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>


            <a href="<?php echo SITEURL; ?>admin/add-offers.php" class="btn-primary"><h3>add offer</h3></a>

            </br>
            </br>

            <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>s.n</th>
                        <th>title</th>
                        <th>description</th>
                        <th>active</th>
                        <th>actions</th>
                    </tr>

                    <?php
                        //create query to get all data from database
                        $sql="SELECT * FROM tbl_offer";

                        $sn=1;

                        //execute query
                        $res=mysqli_query($conn, $sql);

                        //check if query worked or not
                        if($res==true)
                        {
                            //count rows to check if we have data or not
                            $count=mysqli_num_rows($res);

                            //check the number of row
                            if($count>0)
                            {
                                //we have data in database
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    //get individual data
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    $description=$rows['description'];
                                    $active=$rows['active'];

                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $description; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-offer.php?id=<?php echo $id; ?>" class="btn-green">update offer</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-offer.php?id=<?php echo $id; ?>" class="btn-red">delete offer</a>
                                        </td>
                                    </tr>


                                    <?php
                                }
                            }
                            else
                            {
                                //wedonot have data
                                //display message
                                ?>
                                <tr>
                                    <td colspan="8"><div class="error">No offer is added.</div></td>
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
<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage reservation</h1>


            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>s.n</th>
                        <th>customer name</th>
                        <th>people</th>
                        <th>date</th>
                        <th>time</th>
                        <th>statue</th>
                        <th>number</th>
                        <th>email</th>
                        <th>message</th>
                        <th>action</th>
                    </tr>

                    <?php
                        //create query to get all data from database
                        $sql="SELECT * FROM tbl_reservation ORDER BY id DESC";//DISPLAY  the latest order at first

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
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    //get individual data
                                    $id=$row['id'];
                                    $customer_name =$row['customer_name'];
                                    $people =$row['people'];
                                    $date =$row['date'];
                                    $time =$row['time'];
                                    $status =$row['status'];
                                    $number =$row['customer_number'];
                                    $email =$row['customer_email'];
                                    $message =$row['message'];
                                    

                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $people; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $time; ?></td>

                                        <td>
                                            <?php 
                                                //reserved, visited, cancelled
                                                if($status=="reserved")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="visited")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-reservation.php?id=<?php echo $id; ?>" class="btn-green">update</a>
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
                                    <td colspan="15"><div class="error">orders not available.</div></td>
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
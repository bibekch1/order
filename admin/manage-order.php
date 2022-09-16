<?php include('partials/header.php'); ?>

    <!-- main content section starts here -->
    <section class="main-content" >
        <div class="wrapper">
            <h1 class="heading">manage order</h1>

            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            
            <div style="overflow-x:auto;">
                <table class="tbl-full" style="width:120%;">
                    <tr>
                        <th>s.n</th>
                        <th>food1</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>food2</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                        <th>order date</th>
                        <th>status</th>
                        <th> name</th>
                        <th>number</th>
                        <th>email</th>
                        <th>address</th>
                        <th>message</th>
                        <th>action</th>
                    </tr>

                    <?php
                        //create query to get all data from database
                        $sql="SELECT * FROM tbl_order ORDER BY id DESC";//DISPLAY  the latest order at first

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
                                    $food1 =$row['food1'];
                                    $price1 =$row['price1'];
                                    $quantity1 =$row['quantity1'];
                                    $food2 =$row['food2'];
                                    $price2 =$row['price2'];
                                    $quantity2 =$row['quantity2'];
                                    $total =$row['total'];
                                    $order_date =$row['order_date'];
                                    $status =$row['status'];
                                    $customer_name =$row['customer_name'];
                                    $number =$row['customer_number'];
                                    $email =$row['customer_email'];
                                    $address =$row['customer_address'];
                                    $message =$row['message'];
                                    

                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $food1; ?></td>
                                        <td><?php echo $price1; ?></td>
                                        <td><?php echo $quantity1; ?></td>
                                        <td><?php echo $food2; ?></td>
                                        <td><?php echo $price2; ?></td>
                                        <td><?php echo $quantity2; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                //ordered, on-delivery, delivered, calcelled
                                                if($status=="ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="on delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $number; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $message; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-green">update</a>
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
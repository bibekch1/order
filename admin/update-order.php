<?php include('partials/header.php'); ?>


<section class="main-content">

    <div class="wrapper">
        <h1 class="heading">update order</h1>

        <?php
            //check if id is set or not
            if(isset($_GET['id']))
            {
                //det the id details
                $id = $_GET['id'];

                //get all details based on id
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                //execute query
                $res = mysqli_query($conn, $sql);
                //count row
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //detail available
                    $row= mysqli_fetch_assoc($res);

                    $food1 = $row['food1'];
                    $price1 = $row['price1'];
                    $quantity1 = $row['quantity1'];
                    $food2 = $row['food2'];
                    $price2 = $row['price2'];
                    $quantity2 = $row['quantity2'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_number = $row['customer_number'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                    $message = $row['message'];

                }
                else
                {
                    //detail not available and redirect to manage order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //redirect to manage order page
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>


        <form action="update-order-process.php" method="POST">
            <div class="input-box">
                <div class="input">food1</div>
                <div class="input"><div class="text"><b><?php echo $food1; ?></b></div></div>
            </div>
            <div class="input-box">
                <div class="input">price</div>
                <div class="input"><div class="text"><b>rs.<?php echo $price1; ?></b></div></div>
            </div>
            <div class="input-box">
                <div class="input">quantity</div>
                <div class="input"><input type="number" name="quantity1" value="<?php echo $quantity1;?>" required></div>
            </div>
            <div class="input-box">
                <div class="input">food2</div>
                <div class="input"><div class="text"><b><?php echo $food2; ?></b></div></div>
            </div>
            <div class="input-box">
                <div class="input">price</div>
                <div class="input"><div class="text"><b>rs.<?php echo $price2; ?></b></div></div>
            </div>
            <div class="input-box">
                <div class="input">quantity</div>
                <div class="input"><input type="number" name="quantity2" value="<?php echo $quantity2;?>" required></div>
            </div>
            <div class="input-box">
                <div class="input">status</div>
                <div class="input">
                    <select name="status" id="" >
                        <option <?php if($status=="ordered"){echo "selected";}?> value="ordered">ordered</option>
                        <option <?php if($status=="on delivery"){echo "selected";}?> value="on delivery">on delevery</option>
                        <option <?php if($status=="delivered"){echo "selected";}?> value="delivered">delevered</option>
                        <option <?php if($status=="cancelled"){echo "selected";}?> value="cancelled">cancelled</option>
                    </select>
                </div>
            </div>
            <div class="input-box">
                <div class="input">customer name</div>
                <div class="input"><input type="text" name="customer_name" value="<?php echo $customer_name;?>" required></div>
            </div>
            <div class="input-box">
                <div class="input">number</div>
                <div class="input"><input type="tel" name="customer_number" value="<?php echo $customer_number;?>" pattern="{0-9}{10}" placeholder="eg. 9842******" required></div>
            </div>
            <div class="input-box">
                <div class="input">email</div>
                <div class="input"><input type="email" name="customer_email" value="<?php echo $customer_email;?>" placeholder="eg. abc123@realtest.com" required></div>
            </div>
            <div class="input-box">
                <div class="input">address</div>
                <div class="input"><textarea name="customer_address" id="" cols="30" rows="10" required><?php echo $customer_address;?></textarea></div>
            </div>
            <div class="input-box">
                <div class="input">message</div>
                <div class="input"><textarea name="message" id="" cols="30" rows="10"><?php echo $message;?></textarea></div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="price1" value="<?php echo $price1; ?>">
            <input type="hidden" name="price2" value="<?php echo $price2; ?>">
            
            <input type="submit" name="submit" value="update" class="btn">
        </form>


    </div>
</section>


<?php include('partials/footer.php'); ?>



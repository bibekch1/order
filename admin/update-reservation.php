<?php include('partials/header.php'); ?>

    <section class="main-content">
        <div class="wrapper">
            <h1 class="heading">update reservation</h1>

            <?php
                //check if id is set or not
                if(isset($_GET['id']))
                {
                    //get id
                    $id=$_GET['id'];

                    //get data from database
                    //create query to get data
                    $sql = "SELECT * FROM tbl_reservation WHERE id=$id";

                    //execute query
                    $res = mysqli_query($conn, $sql);

                    //count rows
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //detail available
                        $row = mysqli_fetch_assoc($res);

                        $customer_name=$row['customer_name'];
                        $people = $row['people'];
                        $date = $row['date'];
                        $time = $row['time'];
                        $status = $row['status'];
                        $customer_number = $row['customer_number'];
                        $customer_email = $row['customer_email'];
                        $message = $row['message'];

                    }
                    else
                    {
                        //detail not available
                        header('location:'.SITEURL.'admin/manage-reservation.php');//redirect to manage reseravaton page
                    }

                }
                else
                {
                    //redirect to manage-reservation page
                    header('location:'.SITEURL.'admin/manage-reservation.php');
                }
            ?>
            <form action="update-reservation-process.php" method="POST">

                <div class="input-box">
                    <div class="input">name</div>
                    <div class="input"><input type="text" name="customer_name" value="<?php echo $customer_name; ?>" required></div>
                </div>
                
                <div class="input-box">
                    <div class="input">people</div>
                    <div class="input"><input type="number" name="people" value="<?php echo $people; ?>" required></div>
                </div>
                <div class="input-box">
                    <div class="input">date</div>
                    <div class="input"><input type="date" name="date"  value="<?php echo $date; ?>" required></div>
                </div>
                <div class="input-box">
                    <div class="input">time</div>
                    <div class="input"><input type="time" name="time" value="<?php echo $time; ?>" required></div>
                </div>
                <div class="input-box">
                    <div class="input">status</div>
                    <div class="input">
                        <select name="status" id="">
                            <option <?php if($status=="reserved"){echo "selected";}?> value="reserved">reserved</option>
                            <option <?php if($status=="visited"){echo "selected";}?> value="visited">visited</option>
                            <option <?php if($status=="cancelled"){echo "selected";}?> value="cancelled">cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="input-box">
                    <div class="input">number</div>
                    <div class="input"><input type="tel" name="customer_number" value="<?php echo $customer_number; ?>" pattern="{0-9}{10}" required></div>
                </div>
                <div class="input-box">
                    <div class="input">email</div>
                    <div class="input"><input type="email" name="customer_email" value="<?php echo $customer_email; ?>" required></div>
                </div>
                <div class="input-box">
                    <div class="input">message</div>
                    <div class="input"><textarea name="message" id="" cols="30" rows="10"><?php echo $message; ?></textarea></div>
                </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="submit" name="submit" value="update reservation" class="btn">

            </form>


        </div>
    </section>
<?php include('partials/footer.php'); ?>
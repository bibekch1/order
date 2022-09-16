<?php include('partials-front/header.php'); ?>
   
<!-- reservation section starts here -->
<section class="reservation" id="reservation" style="margin-top:6rem;">
    <h3 class="sub-heading">reserve now</h3>
    <h1 class="heading">free and fast</h1>

    <form action="" method="POST">

        <div class="inputbox">

            <div class="input">
                <span>name</span>
                <input type="text" name="customer_name" placeholder="enter your name" required>
            </div>
            <div class="input">
                <span>number</span>
                <input type="tel" name="customer_number" pattern="{0-9}{10}" placeholder="eg. 9842******" required>
            </div>
        </div>

        <div class="inputbox">

            <div class="input">
                <span>people</span>
                <input type="number" name="people" placeholder="number of people" required>
            </div>
            <div class="input">
                <span>email</span>
                <input type="email" name="customer_email" placeholder="eg. abc123@realtest.com" required>
            </div>
        </div>

        <div class="inputbox">

            <div class="input">
                <span>date </span>
                <input type="date" name="date" required>
            </div>
            <div class="input">
                <span>time</span>
                <input type="time" name="time" min="09:00" max="21:00" required>
            </div>
        </div>

        <div class="inputbox">
            <div class="input"  style="width:100%;">
                <span>message</span>
                <textarea name="message" id="" cols="30" rows="10"></textarea>
            </div>
        </div>

        <input type="submit" name="submit" value="order now" class="btn">

    </form>

    <?php

        //check if submit button clicked or not
        if(isset($_POST['submit']))
        {
            //submit clicked
            //get data from form


            //update data into database
            $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']); 
            $people = $_POST['people'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            
            $status = "reserved";//status is reserved

            $customer_number = mysqli_real_escape_string($conn, $_POST['customer_number']);
            $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);

            //create a query to insert data into database
            $sql = "INSERT INTO tbl_reservation SET
                customer_name='$customer_name',
                people=$people,
                date='$date',
                time='$time',
                status='$status',
                customer_number='$customer_number',
                customer_email='$customer_email',
                message='$message'

            ";

            //execute query
            $res= mysqli_query($conn, $sql);

            //check if qery executed or not
            if($res==true)
            {
                //executed
                $_SESSION['reservation']="<div class='success'>Table reserved succesfully.</div>";
                header('location:'.SITEURL);//redirect to home
            }
            else
            {
                //not executed
                $_SESSION['reservation']="<div class='error'>Failed to reserve table.</div>";
                header('location:'.SITEURL);//redirect to home
            }



        }
        
        
    ?>

</section>
<!-- reservation section ends here -->




<?php include('partials-front/footer.php'); ?>
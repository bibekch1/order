<?php
    include('../config/constants.php');

    //check if submit buttion is clicked or not
    if(isset($_POST['submit']))
    {
        //store data from form
        $id= $_POST['id'];
        $customer_name=mysqli_real_escape_string($conn, $_POST['customer_name']);
        $people = $_POST['people'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $status = $_POST['status'];
        $customer_number = mysqli_real_escape_string($conn, $_POST['customer_number']);
        $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        //make a query to update data to database
        $sql2 = "UPDATE  tbl_reservation SET
            customer_name='$customer_name',
            people = $people,
            date = '$date',
            time = '$time',
            status = '$status',
            customer_number = '$customer_number',
            customer_email = '$customer_email',
            message = '$message'

            WHERE id=$id
        ";

        //execute query
        $res2= mysqli_query($conn, $sql2);

        if($res2==true)
        {
            //reservation upadated
            $_SESSION['update']= "<div class='success'>reservation updated successfully.</div>";
            header('location:'.SITEURL.'admin/manage-reservation.php');//redirect to manage reservation page
        }
        else
        {
            //failed to update reservation
            $_SESSION['update']= "<div class='error'>Failed to update reservation.</div>";
            header('location:'.SITEURL.'admin/manage-reservation.php');//redirect to manage reservation page
        }
    }
?>
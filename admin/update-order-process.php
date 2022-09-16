<?php

include('../config/constants.php');

//check whether update button is clicked or not
if(isset($_POST['submit']))
{
    //get all value from form
    $id = $_POST['id'];
    $price1 = $_POST['price1'];
    $quantity1 = $_POST['quantity1'];
    $price2 = $_POST['price2'];
    $quantity2 = $_POST['quantity2'];

    $total = ($price1 * $quantity1)+($price2 * $quantity2);

    $status = $_POST['status'];

    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_number = mysqli_real_escape_string($conn, $_POST['customer_number']);
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    //update values
    $sql2 = "UPDATE tbl_order SET
        quantity1 = $quantity1,
        quantity2 = $quantity2,
        total = $total,
        status = '$status',
        customer_name = '$customer_name',
        customer_number = '$customer_number',
        customer_email = '$customer_email',
        customer_address = '$customer_address',
        message = '$message'
        WHERE id=$id

    ";

    //execute query
    $res2 = mysqli_query($conn, $sql2);

    //check if updated or not
    //and redirect to manage order with message
    if($res2==true)
    {
        //updated
        $_SESSION['update'] = "<div class='success'>Order updated succesfully.</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
    else
    {
        //failed to update
        $_SESSION['update'] = "<div class='error'>Fail to updated order.</div>";
        header('location:'.SITEURL.'admin/manage-order.php');
    }
}
?>
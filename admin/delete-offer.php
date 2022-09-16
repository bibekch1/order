<?php
    //include constants.php file here
    include('../config/constants.php');
    //1. Get the ID of offer to be deleted
    $id = $_GET['id'];

    //2. Creat SQL query to delete offer
    $sql ="DELETE FROM tbl_offer WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the Query  executed succesfully or not
    if($res==true)
    {
        //Query executeed successfully
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>offer Deleted Successfully.</div>";
        //Redirect to manage offer page
        header('location:'.SITEURL.'admin/manage-offers.php');
    }
    else
    {
        //fail to delete offer
        $_SESSION['delete'] = "<div class='error'>Fail to Deleted offer. Try Again Later.</div>";
        //Redirect to manage offer page
        header('location:'.SITEURL.'admin/manage-offers.php');
    }
?>
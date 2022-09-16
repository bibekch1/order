<?php
    //include constant.php here
    include('../config/constants.php');

    //check the id and image_name is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
         //get the value and delete
         $id=$_GET['id'];
         $image_name=$_GET['image_name'];
 
         //remove the physical image file is availabel
         if($image_name !="avatar.png" or "")
         {
             //image is available so remove it
             $path= "../image/customer/".$image_name;
             //remove the image
             $remove = unlink($path);
 
             // if failed to remove image then add an error and stop the process
             if($remove==false)
             {
                 //set the session message
                 $_SESSION['remove']="<dive class='error'>Faile to remove customer image. </div>";
                 header('location:'.SITEURL.'admin/manage-review.php'); //redirect to manage menu page
                 die(); //stop the process
 
             }
         }

        //creat sql query to delete review
        $sql = "DELETE FROM tbl_review WHERE id=$id";

        //execute query
        $res = mysqli_query($conn, $sql);

        //check if query executed or not
        if($res==true)
        {
            //Query executeed successfully
            //create session variable to display message
            $_SESSION['delete'] = "<div class='success'>review Deleted Successfully.</div>";
            //Redirect to manage offer page
            header('location:'.SITEURL.'admin/manage-review.php');
        }
        else
        {
            //fail to delete offer
            $_SESSION['delete'] = "<div class='error'>Fail to Deleted review. Try Again Later.</div>";
            //Redirect to manage offer page
            header('location:'.SITEURL.'admin/manage-review.php');
        }
    }


?>
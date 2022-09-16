<?php

//include constants.php file here
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
            $path= "../image/admin/".$image_name;
            //remove the image
            $remove = unlink($path);

            // if failed to remove image then add an error and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove']="<dive class='error'>Faile to remove admin image. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php'); //redirect to manage menu page
                die(); //stop the process

            }
        }

        //delete data from database
        $sql = "DELETE FROM tbl_admin WHERE id=$id";

        //execute the query
        $res=mysqli_query($conn, $sql);

        //check if the data is deleted from database or not
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete']="<div class='success'>Admin deleted succesfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php'); //redirect to manage menu
        }
        else
        {
            //set fail message and redirect
            $_SESSION['delete']="<div class='error'>Failed to  delete Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php'); //redirect to mange adminn
        }
    }
    else
    {
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>
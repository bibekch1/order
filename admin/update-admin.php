<?php include('partials/header.php'); ?>

<section class="main-content" >
    <div class="wrapper">
        <h1 class="heading">update admin</h1>

        <?php
            //1. Get the id of selected Amin
            $id=$_GET['id'];

            //2. create SQL query to Get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //Execute Query
            $res=mysqli_query($conn, $sql);

            //check whether the querry executed or not
            if($res==true)
            {
                //check whether the data is available or not 
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get details
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $current_image= $row['image_name'];

                }
                else
                {
                    //redirects to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        
                <div class="input-box">
                    <div class="input">full name</div>
                    <div class="input"><input type="text" name="full_name" value="<?php echo $full_name; ?>" required></div>
                </div>

                <div class="input-box">
                    <div class="input">user name</div>
                    <div class="input"><input type="text" name="username" value="<?php echo $username; ?>" required readonly></div>
                </div>

                <div class="input-box">
                    <div class="input">current image</div>
                    <div class="input">
                        <?php

                            if($current_image != "")
                            {
                                //display image
                                ?>
                                <img src="<?php echo SITEURL; ?>image/admin/<?php echo $current_image; ?>" width="50px">
                                <?php
                            }
                            else
                            {
                                //display message
                                echo "<div class='error'>Image not added.</div>";
                            }
                        ?>
                    </div>
                </div>

                <div class="input-box">
                    <div class="input">new image</div>
                    <div class="input"><input type="file" class="image" name="image"></div>
                </div>

                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="update admin" class="btn">
                   
        </form>

        <?php
            //check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the value from form update
                $id= mysqli_real_escape_string($conn, $_POST['id']);
                $full_name= mysqli_real_escape_string($conn, $_POST['full_name']);
                $username= mysqli_real_escape_string($conn, $_POST['username']);
                $current_image=$_POST['current_image'];

                //updating new image if selected

                //check if image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image name
                    $image_name=$_FILES['image']['name'];

                    //check if image is available or not
                    if($image_name !="")
                    {
                        //image available
                        //A. upload the new image
                        //Auto rename image
                        //get the extention of our image(.jpg, .pgn, .gif, etc) eg. spefood1.jpg
                        $ext = end(explode('.', $image_name));

                        //rename image
                        $image_name = "admin_".rand(000,999).'.'.$ext; //eg. menu_food_345.jpg

                        $source_path =$_FILES['image']['tmp_name'];

                        $destination_path="../image/admin/".$image_name;

                        //finally upload image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether the mage is uploaded or not
                        //And if the image is not uplosded then stop the process and redirect with error message
                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'> Failed to upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-admin.php'); // redirect to add admin page
                            die();
                        }
                        //B. remove current image
                        if($current_image != "")
                        {
                            $remove_path= "../image/admin/".$current_image;

                            $remove = unlink($remove_path);
            
                            //check if image is removed or not 
                            // if faild to remove display message and stoop process
                            if($remove==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove']="<div class='error'>Failed to remove current image.</div>";
                                header('location:'.SITEURL.'admin/manage-admin.php');//redirect to manage menu page
                                die(); // stop process
                            }
                        }
                            
                    }
                    else
                    {
                        $image_name=$current_image;
                    }
                }
                else
                {
                    $image_name=$current_image;
                }

                //creat SQL querry to update admin
                $sql2 = "UPDATE tbl_admin SET
                full_name = '$full_name',
                username = '$username',
                image_name= '$image_name' 
                WHERE id= '$id'
                ";

                //Execute the query
                $res2 = mysqli_query($conn, $sql2);

                //Check whether the query execute succesfully or not
                if($res2==true)
                {
                    //querry executed and admin updated
                    $_SESSION['update'] = "<div class='success'>Admin Updated Succesfully.</div>";
                    //Redirect page to Manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    //faile to update admin
                    $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
                    //Redirect page to Manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }
        ?>

    </div>
</section>


<?php include('partials/footer.php'); ?>



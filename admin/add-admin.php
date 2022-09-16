<?php include('partials/header.php'); ?>



<section class="main-content">

    <div class="wrapper">

        <h1 class="heading">add admin</h1>

        <?php
            if(isset($_SESSION['add']))//checking wheather session is set or not
            {
                echo $_SESSION['add']; //display session message
                unset($_SESSION['add']); //remove session message
            }
            if(isset($_SESSION['username-already-exist']))//checking wheather session is set or not
            {
                echo $_SESSION['username-already-exist']; //display session message
                unset($_SESSION['username-already-exist']); //remove session message
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="input-box">
                <div class="input">full name</div>
                <div class="input"><input type="text" name="full_name" placeholder="enter your name" required></div>
            </div>

            <div class="input-box">
                <div class="input">user name</div>
                <div class="input"><input type="text" name="username" placeholder="enter username" required></div>
            </div>

            <div class="input-box">
                <div class="input">password</div>
                <div class="input"><input type="password" name="password" placeholder="enter password" required></div>
            </div>

            <div class="input-box">
                <div class="input">image</div>
                <div class="input"><input type="file" class="image" name="image" ></div>
            </div>

            <input type="submit" name="submit" value="add admin" class="btn">
                    
                

        </form>


        <?php

            // process the value from form and save in database

            // check whether the submit button is clicked or not

            if(isset($_POST['submit']))
            {
                //1. get data from form
                $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = md5($_POST['password']); //password Encryption with MD5
                $admin_type = "normal admin";

                //check whether image is selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);
                // die();
                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    //to upload image we need image image name, source path and destination path
                    $image_name=$_FILES['image']['name'];

                    //upload the image only if image is selected
                    if($image_name != "")
                    {

                        //Auto rename image
                        //get the extention of our image(.jpg, .pgn, .gif, etc) eg. spefood1.jpg
                        $ext = end(explode('.', $image_name));

                        //rename image
                        $image_name = "admin_".rand(000,999).'.'.$ext; //eg. admin_345.jpg

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
                    }
                    else
                    {
                        //don't upload the image and set the image_name value as avatar.png
                        $image_name="avatar.png";
                    }
                }
                else
                {
                    //don't upload the image and set the image_name value as blank
                    $image_name="avatar.png";
                }

                
                //check if user name is already exist or not

                //create sql query to select data 
                $sql1 = "SELECT * FROM tbl_admin WHERE username='$username'" ;

                //execute query
                $res1 = mysqli_query($conn, $sql1);

                //count the number of rows
                $count1= mysqli_num_rows($res1);

                if($count1!=0)
                {
                    echo "true";
                    //user name alreadry exist
                    $_SESSION['username-already-exist'] = "<div class='error'>user name already exist.</div>";
                    header('location:'.SITEURL.'admin/add-admin.php'); //redirect to add admin page
                
                }
                else
                {
                    //user name doesnot exist

                    //2. SQL Query to save data into database
                    $sql = "INSERT INTO tbl_admin SET
                        full_name='$full_name',
                        username='$username',
                        password='$password',
                        image_name='$image_name',
                        admin_type='$admin_type'
                    ";

                    //3. Execute Query and save data in database

                    $res = mysqli_query($conn, $sql) or die(mysqli_error());

                    
                    //4. check wheather the (Query is Executed ) data is inserted or not and display appropriate message

                    if($res==TRUE)
                    {
                        //data inserted
                        // echo "data inserted";
                        //Create a session variable to display message
                        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
                        //REdirect page to manage ADmin
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //fail to insert data
                        // echo "fail to insert data";
                        //Create a session variable to display message
                        $_SESSION['add'] = "</div class'error'>fail to add admin</div>";
                        //REdirect page to manage ADmin
                        header("location:".SITEURL.'admin/add-admin.php');

                    }

                }
            }

        ?>

    </div>
</section>





<?php include('partials/footer.php'); ?>

